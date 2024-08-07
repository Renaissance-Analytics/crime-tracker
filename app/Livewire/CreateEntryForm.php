<?php

namespace App\Livewire;

use App\Models\CrimeType;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class CreateEntryForm extends Component
{

    public $crimeTypeOptions = [];

    public function mount()
    {
        // $crimeTypes = CrimeType::where('show', true)->get();
        // foreach ($crimeTypes as $crimeType) {
        //     $this->crimeTypeOptions[] = [
        //         'id' => $crimeType->id,
        //         'name' => $crimeType->name,
        //         'hint' => $crimeType->hint
        //     ];
        // }
        $this->crimeTypeOptions = [
            ['id' => 1, 'name' => 'Theft/Burglary', 'hint' => 'Unlawful entry into a building or residence with the intent to commit theft.'],
            ['id' => 2, 'name' => 'Vandalism', 'hint' => 'Deliberate destruction or damage to property.'],
            ['id' => 3, 'name' => 'Assault', 'hint' => 'Physical attack on another person.'],
            ['id' => 4, 'name' => 'Drug Offenses', 'hint' => 'Possession, distribution, or manufacturing of illegal drugs.'],
            ['id' => 5, 'name' => 'Vehicle Theft', 'hint' => 'Stealing cars or other motor vehicles.'],
            ['id' => 6, 'name' => 'Domestic Violence', 'hint' => 'Abuse or violence between family members or intimate partners.'],
            ['id' => 7, 'name' => 'Public Disorder', 'hint' => 'Activities that disturb the peace, such as public intoxication or fighting.'],
            ['id' => 8, 'name' => 'Robbery', 'hint' => 'Taking property from someone by force or threat.'],
            ['id' => 9, 'name' => 'Fraud', 'hint' => 'Deception intended to result in financial or personal gain.'],
            ['id' => 10, 'name' => 'Trespassing', 'hint' => 'Entering someone\'s property without permission.'],
        ];
    }

    public function render()
    {
        return view('livewire.create-entry-form');
    }
}
