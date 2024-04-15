<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request)
    {

        $user = User::findOrFail(Auth::id());

        $userData = $request->only(['name', 'email', 'phone', 'location']);
        $changes = array_diff_assoc($userData, $user->toArray());

        if (!empty($changes)) {
            $user->fill($changes);
            $user->save();
        }

        return redirect()->back()->with('success', 'User updated successfully.');
    }
}
