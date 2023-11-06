<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\AdoptionRequest;
use App\Mail\AdoptionMail;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdoptionController extends Controller
{
    public function index(Animal $animal)
    {
        return view('public.adoption.index', ['animal' => $animal]);
    }

    public function store(Animal $animal, AdoptionRequest $request)
    {
        $data = $request->validated();
        $adoption = $animal->adoptions()->create($data);
        Mail::to(User::all())->send(new AdoptionMail($adoption));
        return redirect()->back()->with('success', 'Formulário preenchido com sucesso!');
    }
}
