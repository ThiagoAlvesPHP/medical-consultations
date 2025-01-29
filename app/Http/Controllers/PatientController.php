<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\StoreRequest;
use App\Http\Requests\Patient\UpdateRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function store(StoreRequest $request)
    {
        $body = $request->only('nome', 'cpf', 'celular');

        $patient = Patient::create([
            'name' => $body['nome'],
            'cpf' => $body['cpf'],
            'phone' => $body['celular'],
        ]);

        return response()->json($patient, 201);
    }

    public function update(string $patient_id, UpdateRequest $request)
    {
        $patient = Patient::find($patient_id);

        if (!$patient)
            return response()->json(['message' => 'Paciente não encontrado'], 404);

        if ($request->has('nome'))
            $patient->name = $request->get('nome');

        if ($request->has('celular'))
            $patient->phone = $request->get('celular');

        $patient->save();

        return response()->json($patient, 200);
    }
}
