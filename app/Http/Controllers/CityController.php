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
}
