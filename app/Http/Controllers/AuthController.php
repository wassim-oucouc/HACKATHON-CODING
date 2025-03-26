<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            "Nom" => "required",
            "Prenom" => "required",
            "email" => "required|unique:Utilisateurs",
            "password" => "required|min:8",
        ]);


        if(!$validate)
        {
            return response()->json([
                "message" =>  "please verify the informations entered",
            ]);
        }
        else
        {
            $Utilisateurs = Utilisateurs::create([
                "Prenom" => $request->Prenom,
                "Nom" => $request->Nom,
                "Email" => $request->email,
                "Password" => hash::make($request->password),
                "Role_id" => 1,
                "status" => "Active",
                "Photo" => $request->Photo
            ]);



            return response()->json([
                "message" => "user is registered"
            ]);
        }
    }

    public function Login(Request $request)
    {
        $validation = $request->validate([
            "Email" => "required",
            "Password" => "required",
        ]); 
        $credentials = $request->only('Email','Password');

        if($validation)
        {
            $user = Utilisateurs::where('Email',$request->Email)->first();
            // return response()->json([
            //     "email" => $request->Email,
            //     "Email base de donne" => $user->Email,
            //     "Password" => $request->Password,
            //     "Password base de donnee" => $user->Password
            // ]);
            
            if(!hash::check($request->Password,$user->Password))
            {
                return response()->json(["error" => "invalid request"]);
            }
            else
            {
            // $user = auth->user();
            $token = JWTAuth::claims(['user' => $user])->Fromuser($user);
            return response()->json([
                "token" => $token,
            ]);
        }
        }
        else
        {
            return response()->json(["error" => "informations Cannot Be Empty"]);
        }

        
}
}