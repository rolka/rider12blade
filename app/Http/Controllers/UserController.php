<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(Request $request, string $locale, string $user): View
    {
        // Prevent viewing your own account
        if ($request->user()->id == $user) {
            abort(403, 'You cannot view your own profile here.');
        }

        $user = User::with(['vehicles.make', 'vehicles.model', 'vehicles.color', 'rides'])->findOrFail($user);

        return view('users.show', compact('user'));
    }
}
