<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class logoutController extends Controller
{
    
    public function logout(Request $request)
    {

       // Elimina todos los tokens del usuario autenticado
        $request->user()->tokens()->delete();

    return response()->json(['message' => 'sucessfully logged out'],200);

    }

  

}
