<div>
    <form wire:submit.prevent="submit" class="space-y-4 flex flex-col">
        <div class="grid grid-cols-2 gap-4">
            <x-mary-input wire:model="name" label="Name" placeholder="Enter your name" hint="(All reports are displayed anonymously)" />
            <x-mary-input wire:model="email" type="email" label="Email" placeholder="Enter your email" hint="(if you want to be notified when this report is approved)" />
        </div>

        <div class="grid grid-cols-2 gap-4">
            <x-mary-input wire:model="location" label="Location" placeholder="Enter crime location" hint="Address or nearest intersection" required />
        
            <x-mary-datetime wire:model="incident_time" label="Incident Time" required />
        </div>

        <x-mary-select wire:model="crime_type" label="Crime Type" required />


        <x-mary-file wire:model="photo_evidence" label="Photo Evidence" accept="image/*" hint="Upload any photos or videos of the crime" />

        <div class="grid grid-cols-3 gap-4">
            <x-mary-input wire:model="car_type" label="Car Type" placeholder="Enter car type (if applicable)" />
            <x-mary-input wire:model="car_color" label="Car Color" placeholder="Enter car color (if applicable)" />
            <x-mary-input wire:model="car_year" type="number" label="Car Year" placeholder="Enter car year (if applicable)" />
        </div>



        <x-mary-textarea wire:model="taken_items" label="Taken Items" placeholder="List any items that were taken" />

        <x-mary-input wire:model="building_entry_method" label="Building Entry Method" placeholder="How did the perpetrator enter? (if applicable)" />

        <x-mary-textarea wire:model="other_notes" label="Other Notes" placeholder="Any additional information" />


        <x-mary-button type="submit" class="btn btn-primary" label="Submit Crime Report" />
    </form>
</div>
