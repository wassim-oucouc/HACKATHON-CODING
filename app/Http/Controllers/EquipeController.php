<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function CreateEquipe(Request $request)
    {
        $request->validate([
            "Nom" => "required",
            "Description" => "required",
            "id" => "required",
            "status" => "required|string",
        ]);
        
        $equipe = Equipe::create([
            "Nom" => $request->Nom,
            "Description" => $request->Description,
            "Created_by_id" => $request->id,
            "status" => "Pending",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return response()->json([
            "message" => "L'équipe est bien créée",
            "équipe" => $equipe,
        ]);
    }

    public function DeleteEquipe(Request $request)
    {
        $equipe = Equipe::findOrFail($request->id);
        $equipe->delete();

        return response()->json([
            "message" => "L'équipe a été bien supprimée",
            "equipe" => $equipe,
        ]);
    }

    public function UpdateEquipe(Request $request)
    {
        $request->validate([
            "Nom" => "required|string",
            "Description" => "required|string",
        ]);

        $equipe = Equipe::findOrFail($request->id);
        $equipe->update([
            "Nom" => $request->Nom,
            "Description" => $request->Description,
        ]);

        return response()->json([
            "message" => "L'équipe est bien modifiée",
            "equipe" => $equipe,
        ]);
    }

    public function GetEquipeByID(Request $request)
    {
        $equipe = Equipe::findOrFail($request->id);

        return response()->json([
            "Equipe" => $equipe,
        ]);
    }
}
