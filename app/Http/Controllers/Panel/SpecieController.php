<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\SpecieRequest;
use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    private function addBreeds(Specie $specie, array $breeds)
    {
        $breedsIds = [];
        foreach ($breeds as $breed) {
            $breedsIds[] = $specie->breeds()->updateOrCreate(
                ['id' => $breed['id'] ?? null],
                ['name' => $breed['name']]
            )->id;
        }
        $specie->breeds()
            ->whereNotIn('id', $breedsIds)
            ->delete();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $species = Specie::search(request()->all())->paginate();
        return view('panel.specie.index', ['species' => $species]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specie = new Specie();
        return view('panel.specie.form', ['specie' => $specie]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecieRequest $request)
    {
        $data = $request->validated();
        $specie = Specie::create($data);
        $this->addBreeds($specie, $data['breeds'] ?? []);
        return redirect()->route('panel.specie.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specie $specie)
    {
        return view('panel.specie.form', ['specie' => $specie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecieRequest $request, Specie $specie)
    {
        $data = $request->validated();
        $specie->update($data);
        $this->addBreeds($specie, $data['breeds'] ?? []);
        return redirect()->route('panel.specie.index')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specie $specie)
    {
        $specie->delete();
        return redirect()->route('panel.specie.index')->with('success', 'Registro deletado com sucesso!');
    }
}
