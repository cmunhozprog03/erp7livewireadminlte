<?php

namespace App\Http\Livewire\Sectors;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectorsForm extends Component
{
    use WithFileUploads;

    public $company_id, $name, $description, $active, $position, $image, $slug;

    public function render()
    {
        $companies = Company::all();
        return view('livewire.sectors.sectors-form',[
            'companies' => $companies,
        ]);
    }
}
