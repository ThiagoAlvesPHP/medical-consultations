<?php

namespace App\Http\Controllers;

use App\Http\Requests\Doctor\StoreConsultationRequest;
use App\Http\Requests\Doctor\StoreRequest;
use App\Models\Consultation;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::query();

        if ($request->has('nome'))
            $doctors->where('name', 'LIKE', '%' . $request->get('nome') . '%');

        $doctors->orderBy('name');

        return response()->json($doctors->get());
    }

    public function store(StoreRequest $request)
    {
        $body = $request->only('cidade_id', 'nome', 'especialidade');

        $doctor = Doctor::create([
            'city_id' => $body['cidade_id'],
            'name' => $body['nome'],
            'specialty' => $body['especialidade'],
        ]);

        return response()->json($doctor, 201);
    }

    public function storeConsultation(StoreConsultationRequest $request)
    {
        $body = $request->only('medico_id', 'paciente_id', 'data');

        if (Consultation::where('doctor_id', $body['medico_id'])->where('date', $body['data'])->count() > 0)
            return response()
                ->json(['message' => 'O horário selecionado já está ocupado para este médico. Por favor, escolha outro horário.'], 422);

        $consultation = Consultation::create([
            'doctor_id' => $body['medico_id'],
            'patient_id' => $body['paciente_id'],
            'date' => $body['data'],
        ]);

        return response()->json($consultation, 201);
    }

    public function patients(string $doctor_id, Request $request)
    {
        $doctor = Doctor::find($doctor_id);

        if (!$doctor)
            return response()->json(['message' => 'Este médico não foi encontrado.'], 404);

        $consultations = $doctor->consultations();

        if ($request->has('apenas-agendadas'))
            $consultations->where('date', '>', now());

        if ($request->has('nome'))
            $consultations->whereHas('patient', function ($query) use ($request) {
                return $query->where('name', 'LIKE', '%' . $request->get('nome') . '%');
            });

        return $consultations
            ->get()
            ->map(function ($consultation) {
                $patient = $consultation->patient;
                $patient->consultation = $consultation->makeHidden(['patient'])->toArray();

                return $patient;
            });
    }
}
