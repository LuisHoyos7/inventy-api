<?php
namespace App\Http\Controllers\Restify\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;




class logoutController extends Controller
{
    
    public function __invoke(Request $request)
    {

       // Elimina todos los tokens del usuario autenticado
        $request->user()->tokens()->delete();

    return response()->json(['message' => 'sucessfully logged out'],200);

    }

  

}
