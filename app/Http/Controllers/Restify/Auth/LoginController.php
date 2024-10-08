<?php

namespace App\Http\Controllers\Restify\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        /** * @var User $user */
        if (! $user = config('restify.auth.user_model')::query()
            ->whereEmail($request->input('email'))
            ->first()) {
            abort(401, 'Invalid credentials.');
        }

        if (! Hash::check($request->input('password'), $user->password)) {
            abort(401, 'Invalid credentials.');
        }

        return rest($user)
            ->related('company.priceLists')
            ->indexMeta([
                'token' => $user->createToken('login')->plainTextToken,
            ]);
    }
}
