<div class="flex flex-col space-y-4">
    <h1 class="text-2xl font-bold">Users</h1>
    <table class="w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                <td>
                    <x-mary-button wire:click="editUser({{ $user->id }})">Edit</x-mary-button>
                    <x-mary-button wire:click="deleteUser({{ $user->id }})">Delete</x-mary-button>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <x-mary-modal wire:model="userModal" title="User">
        <x-mary-form wire:model="userForm">
            <x-mary-input wire:model="userForm.name" label="Name" required />
            <x-mary-input wire:model="userForm.email" label="Email" required />
            <x-mary-select wire:model="userForm.user_type" label="User Type" required :options="$userTypeOptions" />
        </x-mary-form>
    </x-mary-modal>
</div>
