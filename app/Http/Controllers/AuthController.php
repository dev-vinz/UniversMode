<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*             GET             *|
    \* * * * * * * * * * * * * * * */

    /**
     * Display the forgot password form view.
     * @return View The view.
     */
    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Display the login form view.
     * @return RedirectResponse|View The redirect response or the view.
     */
    public function login(): RedirectResponse|View
    {
        // If the user can be automatically authenticated, do it.
        if (Auth::viaRemember()) {
            return redirect()->route('index');
        }

        return view('auth.login');
    }

    /**
     * Log the user out.
     * @return RedirectResponse The redirect response.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('index');
    }

    /**
     * Display the register form view.
     * @return View The view.
     */
    public function register(): View
    {
        return view('auth.register');
    }

    /**
     * Display the reset password form view.
     * @param string $token The token.
     * @return View The view.
     */
    public function resetPassword(string $token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /* * * * * * * * * * * * * * * *\
    |*             POST            *|
    \* * * * * * * * * * * * * * * */

    /**
     * Authenticate the user.
     * @param Request $request The request object.
     * @return RedirectResponse The redirect response.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        // Validate the request.
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Get the credentials.
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user.
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }

        // Return back with errors.
        return back()
            ->withErrors([
                'email' => 'Adresse mail ou mot de passe incorrect.',
            ])
            ->withInput($request->only('email'));
    }

    /**
     * Reset the user's password.
     * @param Request $request The request object.
     * @return RedirectResponse The redirect response.
     */
    public function passwordReset(Request $request): RedirectResponse
    {
        // Validate the request.
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        // Reset the password.
        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function (
            User $user,
            string $password
        ) {
            $user
                ->forceFill([
                    'password' => Hash::make($password),
                ])
                ->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('status', 'Votre mot de passe a été réinitialisé.')
            : back()
                ->withErrors([
                    'email' =>
                        "Nous n'avons pas pu réinitialiser votre mot de passe. Veuillez vérifier les informations saisies.",
                ])
                ->withInput($request->only('email'));
    }

    /**
     * Send the password reset link.
     * @param Request $request The request object.
     * @return RedirectResponse The redirect response.
     */
    public function sendPasswordResetLink(Request $request): RedirectResponse
    {
        // Validate the request.
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Send the password reset link.
        $status = Password::sendResetLink($request->only('email'));

        // Return back with status or errors.
        return $status === Password::RESET_LINK_SENT
            ? back()->with(
                'status',
                'Un lien de réinitialisation de mot de passe a été envoyé. Vous pouvez fermer cet onglet.'
            )
            : back()->withErrors(['email' => "Nous n'avons pas pu trouver d'utilisateur avec cette adresse mail."]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request.
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'confirmed'],
            ],
            [
                'email.unique' => 'Un compte existe déjà avec cette adresse mail.',
            ]
        );

        if ($validator->fails()) {
            return back() //
                ->withErrors($validator->errors())
                ->withInput($request->except('password'));
        }

        // Retrieve the validated data.
        $data = $validator->validated();

        // Create the user.
        $user = User::create([
            'firstName' => $data['first_name'],
            'lastName' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Authenticate the user.
        Auth::login($user);

        return redirect()->route('index');
    }

    /* * * * * * * * * * * * * * * *\
    |*             PUT             *|
    \* * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*            DELETE           *|
    \* * * * * * * * * * * * * * * */
}
