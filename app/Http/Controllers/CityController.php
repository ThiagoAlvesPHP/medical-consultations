<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::query();

        if ($request->has('nome'))
            $cities->where('name', 'LIKE', '%' . $request->get('nome') . '%');

        $cities->orderBy('name');

        return response()->json($cities->get());
    }

    public function doctors(string $city_id, Request $request)
    {
        $city = City::find($city_id);

        if (!$city)
            return response()->json(['error' => 'Cidade não encontrada!'], 404);

        $doctors = $city->doctors();

        if ($request->has('nome'))
            $doctors->where('name', 'LIKE', '%' . $request->get('nome') . '%');

        $doctors->orderBy('name');

        return $doctors->get();
    }
}
