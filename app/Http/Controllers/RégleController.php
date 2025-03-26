<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RégleController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "Nom" => "required|string",
            "Description" => "required|string"
        ]);

        $Régle = Régle::create([
            "Nom" => $request->Nom,
            "Description" => $request->Description,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return response()->json([
            "Régle" => $Régle,
            "Message" => "Régle Bien Créé",
        ]);
    }

    public function deleteRégle(Request $request)
    {
        $Régle = Régle::find($request->id);
        $Régle->delete();

        return response()->json([
            "message" => "Régle est bien supprimée",
            "Régle" => $Régle
        ]);
    }

    public function updateRégle(Request $request)
    {
        $Régle = Régle::find($request->id);

        $validation = $request->validate([
            "Nom" => "required|string",
            "Description" => "required|string",
        ]);

        $Régle->update([
            "Nom" => $request->Nom,
            "Description" => $request->Description,
        ]);

        return response()->json([
            "message" => "Régle bien modifiée",
            "Régle" => $Régle
        ]);
    }

    public function readRégle(Request $request)
    {
        $Régle = Régle::find($request->id);

        if ($Régle) {
            return response()->json([
                "Régle" => $Régle
            ]);
        } else {
            return response()->json([
                "message" => "Régle non trouvée"
            ], 404);
        }
    }
}
