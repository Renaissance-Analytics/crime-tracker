<div>
    <form wire:submit.prevent="submit" class="flex flex-col space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <x-mary-input wire:model="name" label="Name" placeholder="Enter your name" hint="(All reports are displayed anonymously)" />
            <x-mary-input wire:model="email" type="email" label="Email" placeholder="Enter your email" hint="(if you want to be notified when this report is approved)" />
        </div>

        <div class="grid grid-cols-2 gap-4">
            <x-mary-input wire:model="location" label="Location" placeholder="Enter crime location" hint="Address or nearest intersection" required />
        
            <x-mary-datetime wire:model="incident_time" label="Incident Time" required type="datetime-local" />
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-1">
                <x-mary-select wire:model.live="crime_type" label="Crime Type" required :options="$crimeTypeOptions" placeholder="Select crime type" required />
                @if ($crime_type)
                    <span wire:key="{{ $crime_type }}">{{ $crimeTypeOptions[$crime_type]['hint'] }}</span>
                @endif
            </div>
            <div class="flex flex-col gap-1">
                <x-mary-select wire:model.live="entry_method" label="Entry Method" placeholder="How did the perpetrator enter?" :options="$entryMethodOptions" required/>
                @if ($entry_method)
                    <span wire:key="{{ $entry_method }}">{{ $entryMethodOptions[$entry_method]['hint'] }}</span>
                @endif
            </div>
        </div>



        <div class="grid grid-cols-3 gap-4">
            <x-mary-input wire:model="car_type" label="Car Type" placeholder="Enter car type (if applicable)" />
            <x-mary-input wire:model="car_color" label="Car Color" placeholder="Enter car color (if applicable)" />
            <x-mary-select wire:model.live="car_year" label="Car Year" placeholder="Enter car year (if applicable)" :options="$entryCarYearOptions" />
        </div>


        <div class="grid grid-cols-2 gap-4">
            <x-mary-textarea wire:model="taken_items" label="Taken Items" placeholder="List any items that were taken" />
            <x-mary-file wire:model="photo_evidence" label="Photo Evidence" accept="image/*" hint="Upload any photos or videos of the crime (temporary disabled)" disabled="true" />
        </div>


        <x-mary-textarea wire:model="other_notes" label="Other Notes" placeholder="Any additional information" />


        <x-mary-button type="submit" class="btn btn-primary" label="Submit Crime Report" />
    </form>
</div>
