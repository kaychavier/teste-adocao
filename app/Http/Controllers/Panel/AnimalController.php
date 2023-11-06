<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AnimalRequest;
use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private function addGallery(Animal $animal, array $galleries){
        $galleriesIds = [];
        foreach($galleries as $gallery){
            $data = []; 
            if(isset($gallery['image'])){
                $data['file_path']  = $gallery['image']->store('img/animal/' . $animal->id, 'public');
            }
            $galleriesIds[] = $animal->galleries()->updateOrCreate(['id' => $gallery['id'] ?? null], $data)->id;
        }
        $animal->galleries()->whereNotIn('id', $galleriesIds)->delete();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::search(request()->all())->paginate();
        return view('panel.animal.index', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animal = new Animal();
        $species = Specie::all();
        return view('panel.animal.form', ['animal' => $animal, 'species' => $species]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active'); 
        $animal = Animal::create($data);
        $this->addGallery($animal, $data['gallery']);
        return redirect()->route('panel.animal.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $species = Specie::all();
        return view('panel.animal.form', ['animal' => $animal, 'species' => $species]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalRequest $request, Animal $animal)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active');
        $animal->update($data);
        $this->addGallery($animal, $data['gallery']);
        return redirect()->route('panel.animal.index')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('panel.animal.index')->with('success', 'Registro deletado com sucesso!');
    }
}
