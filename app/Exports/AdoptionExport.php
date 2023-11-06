<?php

namespace App\Exports;

use App\Models\Adoption;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdoptionExport implements FromView
{
    public function __construct(private $adoptions){

    }

    public function view(): View
    {
        return view('exports.adoption', [
            'adoptions' => $this->adoptions
        ]);
    }
}
