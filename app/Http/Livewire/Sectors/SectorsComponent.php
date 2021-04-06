<?php

namespace App\Http\Livewire\Sectors;

use App\Models\Sector;
use Livewire\Component;
use Livewire\WithPagination;

class SectorsComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $sectors = Sector::paginate(3);
        return view('livewire.sectors.sectors-component',[
            'sectors' => $sectors,
        ]);
    }
}
