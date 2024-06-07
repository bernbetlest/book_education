<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index(): View
    {
        if (Auth::user()->role === 'admin') {
            return view('pages.dashboard.profile.index');
        } else {
            return view('pages.profile.index');
        }
    }
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        if (Auth::user()->role === 'admin') {
            return view('pages.dashboard.profile.edit');
        } else {
            return view('pages.profile.edit');
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImage = public_path('assets/images/' . $user->image);
            if ($user->image && file_exists($oldImage)) {
                @unlink($oldImage);
            }

            // Store new image
            $image = $request->file('image');
            $imageName = $user->username . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $imageName);

            // Update user's image path in the database
            $user->image = $imageName;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
