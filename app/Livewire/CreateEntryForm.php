<?php

namespace App\Livewire;

use App\Actions\CreateEntryAction;
use App\Models\CrimeType;
use App\Models\User;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class CreateEntryForm extends Component
{
    use Toast;
    public $crimeTypeOptions = [];
    public $entryMethodOptions = [];
    public $entryCarYearOptions = [];

    public $name;
    public $email;
    public $location;
    public $incident_time;
    public $crime_type;
    public $photo_evidence;
    public $car_type;
    public $car_color;
    public $car_year;
    public $taken_items;
    public $entry_method;
    public $other_notes;
    public int $step = 1;
    public int $totalSteps = 5;
    public $stepNames = [
        1 => 'User Details',
        2 => 'Crime Details',
        3 => 'Vehicle Details',
        4 => 'Miscellaneous',
        5 => 'Review',
    ];

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

        $this->entryMethodOptions = [
            ['id' => 1, 'name' => 'Smashed Window', 'hint' => 'Smashed and entered though a car or building window.'],
            ['id' => 2, 'name' => 'An Unlocked Door/Window', 'hint' => 'Entered through an unlocked door or window.'],
            ['id' => 3, 'name' => 'Picked Lock', 'hint' => 'Picked lock on a car or building.'],
            ['id' => 4, 'name' => 'Busted Door', 'hint' => 'Busted through a door.'],
            ['id' => 5, 'name' => 'Armed Person', 'hint' => 'Used a weapon to force entry.'],
            ['id' => 6, 'name' => 'Other', 'hint' => 'Other method of entry.'],
        ];

        $currentYear = date('Y');
        for ($year = 1950; $year <= $currentYear; $year++) {
            $this->entryCarYearOptions[] = [
                'id' => $year,
                'name' => $year,
            ];
        }
    }

    public function nextStep()
    {
        $this->validateCurrentStep();
        if($this->step < $this->totalSteps) {
            $this->step++;
        }
    }

    public function prevStep()
    {
        if($this->step > 1) {
            $this->step--;
        }
    }

    public function addSampleData()
    {
        $this->name = 'John Doe';
        $this->email = 'john@doe.com';
        $this->location = '123 Main St, Anytown, USA';
        $this->incident_time = '2024-01-01 12:00:00';
        $this->crime_type = 1;
        $this->entry_method = 1;
        $this->car_type = 'Toyota';
        $this->car_color = 'Red';
        $this->car_year = 2024;
        $this->taken_items = 'Laptop';
        $this->photo_evidence = 'https://example.com/photo.jpg';
        $this->other_notes = 'This is a sample note';
    }

    public function validateCurrentStep()
    {
        switch ($this->step) {
            case 1:
                $this->validate([
                    'email' => 'nullable|email',
                ]);
                break;
            case 2:
                $this->validate([
                    'location' => 'required',
                    'incident_time' => 'required',
                ]);
                $this->validate([
                    'crime_type' => 'required',
                    'entry_method' => 'required',
                ]);
                break;
           
        }
    }

    public function render()
    {
        return view('livewire.create-entry-form');
    }

    public function submit()
    {
       

        $createEntryAction = new CreateEntryAction();
        $entry = $createEntryAction->execute(
            name: $this->name,
            crimeType: $this->crime_type,
            location: $this->location,
            incidentTime: $this->incident_time,
            email: $this->email,
            photoEvidence: $this->photo_evidence,
            carType: $this->car_type,
            carColor: $this->car_color,
            carYear: $this->car_year,
            takenItems: $this->taken_items,
            entryMethod: $this->entry_method,
            otherNotes: $this->other_notes,
        );
        if($entry) {
            $this->success('Entry created successfully');
            $this->reset();
        } else {
            $this->error('Entry creation failed');
        }
    }
}
