<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*             GET             *|
    \* * * * * * * * * * * * * * * */

    /**
     * Display the user addresses view.
     * @return View The view.
     */
    public function addresses(): View
    {
        // Retrieve the user's addresses.
        $addresses = Auth::user()->addresses;

        return view('user.addresses', ['addresses' => $addresses]);
    }

    /**
     * Display the user address form view.
     * @param string $addressId The address id.
     * @return View The view.
     */
    public function addressForm(string $addressId = null): View
    {
        // Try to retrieve the address.
        if ($addressId !== null) {
            $address = Address::findOrFail($addressId);
        } else {
            $address = null;
        }

        // Check that the address belongs to the user.
        if ($address !== null && $address->user_id !== Auth::user()->id) {
            abort(403);
        }

        return view('user.address-form', ['address' => $address, 'isEdit' => $addressId !== null]);
    }

    /**
     * Display the user informations form view.
     * @return View The view.
     */
    public function informationsForm(): View
    {
        return view('user.informations-form', ['user' => Auth::user()]);
    }

    /**
     * Display the user password form view.
     * @return View The view.
     */
    public function passwordForm(): View
    {
        return view('user.password-form');
    }

    /**
     * Display the user profile view.
     * @return View The view.
     */
    public function profile(): View
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    /**
     * Display the user settings view.
     * @return View The view.
     */
    public function settings(): View
    {
        return view('user.settings', ['user' => Auth::user()]);
    }

    /* * * * * * * * * * * * * * * *\
    |*             POST            *|
    \* * * * * * * * * * * * * * * */

    /**
     * Store an address.
     * @param Request $request The request.
     * @return RedirectResponse The redirect response.
     */
    public function storeAddress(Request $request): RedirectResponse
    {
        // Validate the request.
        $validator = Validator::make($request->all(), [
            'street' => ['required', 'string'],
            'number' => ['required', 'string'],
            'city' => ['required', 'string'],
            'npa' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return back() //
                ->withErrors($validator->errors()) //
                ->withInput($request->all());
        }

        // Retrieve the validated data.
        $data = $validator->validated();

        // Create the address.
        Address::create([
            'street' => $data['street'],
            'number' => $data['number'],
            'city' => $data['city'],
            'npa' => $data['npa'],
            'country' => $data['country'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('user.addresses');
    }

    /* * * * * * * * * * * * * * * *\
    |*             PUT             *|
    \* * * * * * * * * * * * * * * */

    /**
     * Update an address.
     * @param Request $request The request.
     * @param string $addressId The address id.
     * @return RedirectResponse The redirect response.
     */
    public function updateAddress(Request $request, string $addressId): RedirectResponse
    {
        // Validate the request.
        $validator = Validator::make($request->all(), [
            'street' => ['required', 'string'],
            'number' => ['required', 'string'],
            'city' => ['required', 'string'],
            'npa' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return back() //
                ->withErrors($validator->errors()) //
                ->withInput($request->all());
        }

        // Retrieve the validated data.
        $data = $validator->validated();

        // Retrieve the address.
        $address = Address::findOrFail($addressId);

        // Update the address.
        $address->update([
            'street' => $data['street'],
            'number' => $data['number'],
            'city' => $data['city'],
            'npa' => $data['npa'],
            'country' => $data['country'],
        ]);

        $address->save();

        return redirect()->route('user.addresses');
    }

    /**
     * Update the user's password.
     * @param Request $request The request.
     * @return RedirectResponse The redirect response.
     */
    public function updateInformations(Request $request): RedirectResponse
    {
        // Validate the request.
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            ],
            [
                'email.unique' => 'Un compte existe déjà avec cette adresse mail.',
            ]
        );

        if ($validator->fails()) {
            return back() //
                ->withErrors($validator->errors()) //
                ->withInput($request->all());
        }

        // Retrieve the validated data.
        $data = $validator->validated();

        // Retrieve the user.
        $user = User::findOrFail(Auth::user()->id);

        // Update the user.
        $user->update([
            'firstName' => $data['first_name'],
            'lastName' => $data['last_name'],
            'email' => $data['email'],
        ]);

        $user->save();

        return redirect()->route('user.settings');
    }

    /**
     * Update the user's password.
     * @param Request $request The request.
     * @return RedirectResponse The redirect response.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        // Validate the request.
        $validator = Validator::make(
            $request->all(),
            [
                'current_password' => ['required'],
                'password' => ['required', 'confirmed'],
            ],
            [
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ]
        );

        if ($validator->fails()) {
            return back() //
                ->withErrors($validator->errors());
        }

        // Retrieve the validated data.
        $data = $validator->validated();

        // Check the current password.
        if (!Hash::check($data['current_password'], Auth::user()->password)) {
            return back() //
                ->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Retrieve the user.
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        $user->save();

        return redirect()->route('user.settings');
    }

    /* * * * * * * * * * * * * * * *\
    |*            DELETE           *|
    \* * * * * * * * * * * * * * * */

    /**
     * Delete an address.
     * @param string $addressId The address id.
     * @return RedirectResponse The redirect response.
     */
    public function deleteAddress(string $addressId): RedirectResponse
    {
        // Retrieve the address.
        $address = Address::findOrFail($addressId);

        // Delete the address.
        $address->delete();

        return redirect()->route('user.addresses');
    }
}
