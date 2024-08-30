<?php

namespace App\Http\Controllers\Restify\Auth;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Company;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
        $inputs = $request->validated();

        $company = Company::create(['name' => $inputs['company_name']]);

        $user = $company->users()->create($inputs);

        return rest($user)->indexMeta([
            'token' => $user->createToken('register')->plainTextToken,
        ]);
    }
}
