<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesComponent extends Component
{
    public $search, $selectedItem, $action;

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    public function selectedItem($id, $action)
    {
        $this->selectedItem = $id;

        if($action == 'delete'){
            // This will show the modal on the front-end
            $this->dispatchBrowserEvent('openDeleteModal');
        }else {
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal');
        }
    }

    public function delete()
    {

        Company::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }

    

    public function render()
    {
        $search = '%'.$this->search.'%';
        $companies = Company::where('name', 'LIKE', $search)
                    ->orderBy('name', 'ASC')->paginate(3);
        return view('livewire.companies.companies-component', [
            'companies' => $companies,
        ]);
    }
}
