<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function index(Request $request)
    {
        $breeds = Breed::where('specie_id', 'like', '%' . $request->specie_id . '%')->get();
        return response()
            ->json([
                'breeds' => $breeds
            ]);
    }
}
