<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::search(request()->all())->where('is_active', true)->paginate(12);
        $species = Specie::all();
        return view('public.animal.index', ['animals' => $animals, 'species' => $species]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        abort_if(!$animal->is_active, 404);
        return view('public.animal.show', ['animal' => $animal]);
    }
}
