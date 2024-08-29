<div class="flex flex-col space-y-4">
    <!-- Progress Bar -->
    <div class="relative w-full h-4 mb-4 bg-gray-200 rounded-full">
        <div class="h-4 bg-blue-600 rounded-full" style="width: {{ ($step / $totalSteps) * 100 }}%"></div>
        <div class="absolute top-0 left-0 flex items-center justify-between w-full h-full text-xs text-gray-700">
            @foreach ($stepNames as $index => $name)
                <div class="flex-1 text-center {{ $index <= $step ? 'font-bold text-white' : 'text-gray-700' }}">
                    {{ $name }}
                </div>
            @endforeach
        </div>
    </div>
    @if (env('APP_ENV') == 'local')
        <x-mary-button wire:click="addSampleData" type="button" class="btn btn-primary" label="Add Sample Data" />
    @endif
    @switch($step)
        @case(1)
            <span>User details are not required, either way this information is never made public.</span>
            <div class="grid grid-cols-2 gap-4">
                
                <x-mary-input wire:model="name" label="Name" placeholder="Enter your name" hint="(All reports are displayed anonymously)" />
                <x-mary-input wire:model="email" type="email" label="Email" placeholder="Enter your email" hint="(if you want to be notified when this report is approved)" />
            </div>
            @break
        @case(2)
            <div class="grid grid-cols-2 gap-4">
                <x-mary-input wire:model="location" label="Location" placeholder="Enter crime location" hint="Address or nearest intersection" required />
            
                <x-mary-datetime wire:model="incident_time" label="Incident Time" required type="datetime-local" />
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <x-mary-select wire:model.live="crime_type" label="Crime Type" required :options="$crimeTypeOptions" placeholder="Select crime type" required />
                    {{-- @isset ($crime_type)
                        <span wire:key="{{ $crime_type }}">{{ $crimeTypeOptions[$crime_type]['hint'] }}</span>
                    @endisset --}}
                </div>
                <div class="flex flex-col gap-1">
                    <x-mary-select wire:model.live="entry_method" label="Entry Method" placeholder="How did the perpetrator enter?" :options="$entryMethodOptions" required/>
                    {{-- @isset ($entry_method)
                        <span wire:key="{{ $entry_method }}">{{ $entryMethodOptions[$entry_method]['hint'] }}</span>
                    @endisset --}}
                </div>
            </div>
            @break
        @case(3)
            <span>If crime is related to a vehicle, please provide the following information.</span>

            <div class="grid grid-cols-3 gap-4">
                <x-mary-input wire:model="car_type" label="Car Type" placeholder="Enter car type (if applicable)" />
                <x-mary-input wire:model="car_color" label="Car Color" placeholder="Enter car color (if applicable)" />
                <x-mary-select wire:model.live="car_year" label="Car Year" placeholder="Enter car year (if applicable)" :options="$entryCarYearOptions" />
            </div>


            <div class="grid grid-cols-2 gap-4">
                <x-mary-textarea wire:model="taken_items" label="Taken Items" placeholder="List any items that were taken" />
                <x-mary-file wire:model="photo_evidence" label="Photo Evidence" accept="image/*" hint="Upload any photos or videos of the crime (temporary disabled)" disabled="true" />
            </div>

            
            @break

        @case(4)
            <span> Other notes or links to add to the report.</span>
            <x-mary-textarea wire:model="other_notes" label="Other Notes" placeholder="Any additional information" />
            @break
        @case(5)
            <div class="flex flex-col gap-4">
                <span>Review your report before submitting.</span>
                <table class="w-full">
                    <tr>
                        <td class="font-bold">Name</td>
                        <td class="flex-grow">{{ $name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Email</td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Location</td>
                        <td>{{ $location }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Incident Time</td>
                        <td>{{ $incident_time }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Crime Type</td>
                        <td>{{ $crime_type }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Entry Method</td>
                        <td>{{ $entry_method }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Car Type</td>
                        <td>{{ $car_type }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Car Color</td>
                        <td>{{ $car_color }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Car Year</td>
                        <td>{{ $car_year }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Taken Items</td>
                        <td>{{ $taken_items }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Photo Evidence</td>
                        <td>{{ $photo_evidence }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Other Notes</td>
                        <td>{{ $other_notes }}</td>
                    </tr>
                </table>
                <x-mary-button wire:click="submit" type="submit" class="btn btn-primary" label="Submit Crime Report" />
            </div>
            @break
    @endswitch
    <div class="flex justify-between">
        @if ($step > 1)
            <x-mary-button type="button" class="btn btn-primary" label="Previous" wire:click="prevStep" />
        @endif
        @if ($step < $totalSteps)
            <x-mary-button type="button" class="btn btn-primary" label="Next" wire:click="nextStep" />
        @endif
    </div>
</div>
