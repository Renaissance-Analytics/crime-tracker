<?php

namespace App\Actions;

use App\Models\CrimeEntry;
use Carbon\Carbon;

class CreateEntryAction
{
    public function execute(
        string $name,
        string $crimeType,
        string $location,
        string $incidentTime,
        string $email,
        ?string $photoEvidence,
        string $carType,
        string $carColor,
        ?string $carYear,
        ?string $takenItems,
        string $entryMethod,
        ?string $otherNotes,
    ): CrimeEntry
    {
        return CrimeEntry::create([
            'name' => $name,
            'crime_type' => $crimeType,
            'location' => $location,
            'incident_time' => Carbon::parse($incidentTime)->format('Y-m-d H:i:s'),
            'email' => $email,
            'photo_evidence' => $photoEvidence,
            'car_type' => $carType,
            'car_color' => $carColor,
            'car_year' => $carYear,
            'taken_items' => $takenItems,
            'entry_method' => $entryMethod,
            'other_notes' => $otherNotes,
        ]);
    }
}