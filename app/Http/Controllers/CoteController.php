<?php

namespace App\Http\Controllers;

use App\Models\Cote;
use Illuminate\Http\Request;

class CoteController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|integer',
            'cours' => 'required|string',
            'note' => 'required|numeric',
        ]);

        $cote = Cote::create($request->all());
        return response()->json($cote, 201);
    }

    public function index()
    {
        $data = Cote::all()->groupBy('etudiant_id')->map(function ($notes) {
            return [
                'etudiant_id' => $notes[0]->etudiant_id,
                'cotes' => $notes->map(function ($cote) {
                    return [
                        'cours' => $cote->cours,
                        'note' => $cote->note
                    ];
                })->values()
            ];
        })->values();

        return response()->json($data);
    }
}
