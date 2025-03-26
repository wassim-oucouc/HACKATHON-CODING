<?php

namespace App\Http\Controllers;

use App\Models\Hackathon;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HackathonController extends Controller
{
    public function create(Request $request)
    {
        $roleuser = DB::table('Utilisateurs')
            ->join('role', 'Utilisateurs.Role_id', '=', 'Role.id')
            ->where('Utilisateurs.id', $request->id)
            ->select('Role.Nom')
            ->get();

        if ($roleuser->first()->Nom == 'Organisateur') {
            $validation = $request->validate([
                "Nom" => "required|string",
                "Théme" => "required",
                "Edition" => "required",
                "Lieu" => "required|string"
            ]);

            $hackathon = Hackathon::create([
                "Nom" => $request->Nom,
                "Théme" => $request->Théme,
                "Edition" => $request->Edition,
                "Lieu" => $request->Lieu,
                "Organisateur_id" => $request->id
            ]);

            return response()->json([
                "message" => "Hackathon is created!",
                "Hackathon" => $hackathon,
            ]);
        } else {
            return response()->json([
                "message-warning" => "You are not allowed 404"
            ]);
        }
    }

    public function deleteHackathon(Request $request)
    {
        $roleuser = DB::table('Utilisateurs')
            ->join('role', 'Utilisateurs.Role_id', '=', 'Role.id')
            ->where('Utilisateurs.id', $request->id)
            ->select('Role.Nom')
            ->get();

        if ($roleuser->first()->Nom == 'Organisateur') {
            $hackathondelete = Hackathon::find($request->id_hackathon);
            $hackathondelete->delete();

            return response()->json([
                "message" => "Hackathon deleted successfully!"
            ]);
        } else {
            return response()->json([
                "message-warning" => "You are not allowed 404"
            ]);
        }
    }

    public function update(Request $request, $id_hackathon)
    {
        $roleuser = DB::table('Utilisateurs')
            ->join('role', 'Utilisateurs.Role_id', '=', 'Role.id')
            ->where('Utilisateurs.id', $request->id)
            ->select('Role.Nom')
            ->get();

        if ($roleuser->first()->Nom == "Organisateur") {
            $validate = $request->validate([
                "Nom" => "required|string",
                "Théme" => "required|string",
                "Edition" => "required|string",
                "Lieu" => "required|string"
            ]);

            $hackathon = Hackathon::find($id_hackathon);
            $hackathon->update([
                "Nom" => $request->Nom,
                "Théme" => $request->Théme,
                "Edition" => $request->Edition,
                "Lieu" => $request->Lieu
            ]);

            return response()->json([
                "message" => "Hackathon updated successfully",
                "Hackathon" => $hackathon,
            ]);
        } else {
            return response()->json([
                "message-warning" => "You are not allowed 404"
            ]);
        }
    }
}
