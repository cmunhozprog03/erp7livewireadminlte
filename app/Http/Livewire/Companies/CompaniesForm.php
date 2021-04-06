<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervetion\Image\ImageManager;

class CompaniesForm extends Component
{
    use WithFileUploads;

    public $name, $logo, $modelId;

    protected $listeners = [
        'getModelId',

    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;
        $model = Company::find($this->modelId);

        $this->name = $model->name;
        $this->logo = $model->logo;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpg,jpeg,png,gif',
        ]);

        if(!empty($this->logo))
        {
            $this->logo->store('public/companies');
        }

        $data = [
            'name' => $this->name,
            'logo' => $this->logo->hashName(),
        ];

         if($this->modelId){
            Company::find($this->modelId)->update($data);
         } else {
            Company::create($data);
         }


        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->clearVars();
    }



    public function clearVars(){
        $this->modelId = null;
        $this->name = null;
        $this->log = null;
    }

    public function render()
    {
        return view('livewire.companies.companies-form');
    }
}
