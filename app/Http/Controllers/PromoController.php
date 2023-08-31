<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;


class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return response()->json($promos);
    }

    public function store(Request $request)
    {
        $promo = Promo::create($request->all());
        return response()->json($promo, 201);
    }

    public function show(Promo $promo)
    {
        return response()->json($promo);
    }

    public function update(Request $request, Promo $promo)
    {
        $promo->update($request->all());
        return response()->json($promo);
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();
        return response()->json(['message' => 'Promo deleted successfully.']);
    }
}
