<?php

namespace App\Livewire;

use App\Models\CrimeType;
use App\Models\User;
use Livewire\Component;

class CreateEntryForm extends Component
{

    public $crimeTypeOptions = [];

    public function mount()
    {
        $crimeTypes = CrimeType::where('show', true)->get();
        foreach ($crimeTypes as $crimeType) {
            $this->crimeTypeOptions[] = [
                'id' => $crimeType->id,
                'name' => $crimeType->name,
                'hint' => $crimeType->hint
            ];
        }
    }

    public function render()
    {
        return view('livewire.create-entry-form');
    }
}
