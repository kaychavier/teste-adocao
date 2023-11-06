<?php

namespace App\Http\Controllers\Panel;

use App\Exports\AdoptionExport;
use App\Http\Controllers\Controller;
use App\Models\Adoption;
use  Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function __invoke()
    {
        $query = Adoption::search(request()->all());
        if (request()->has('export')) {
            return Excel::download(new AdoptionExport($query->get()), 'adoptions.xlsx');
        }
        $adoptions = $query->paginate();
        return view('panel.adoption.index', ['adoptions' => $adoptions]);
    }
}
