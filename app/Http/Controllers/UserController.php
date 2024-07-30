<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * Update the user in themeself.
     */
    public function updateUser(Request $request)
    {
        // Define validation rules for all possible fields
        $rules = [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $request->user_id,
            // 'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:20',
            'gender' => 'nullable|string|in:male,female,other',
            'address' => 'nullable|string',
        ];
        $user = User::find($request->user_id);


        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }


        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete previous image if it exists and is not the default one
            if ($user->image !== 'no-avatar.webp') {
                Storage::delete('public/' . $user->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('public/user_images');
            $user->image = str_replace('public/', '', $imagePath);
            $user->save();
            return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
        } else {

            // Validate the request data
            $validatedData = $request->validate($rules);

            // Loop through each validated field and update the user if the new value differs
            foreach ($validatedData as $key => $value) {
                if ($user->$key !== $value) {
                    $user->$key = $value;
                }
            }

            // Handle password update separately
            // if (!empty($validatedData['password']) && !Hash::check($validatedData['password'], $user->password)) {
            //     $user->password = Hash::make($validatedData['password']);
            // }



            // Save the updated user data
            $user->save();

            return redirect()->back()->with('success', 'User updated successfully');
        }
    }




    // get users profile page
    public function userProfile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('profile', compact('user'));
    }
}
