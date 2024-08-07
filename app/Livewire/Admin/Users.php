<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Users extends Component
{
    public $userModal = false;
    public $userForm = [
        'name' => '',
        'email' => '',
        'user_type' => '',
    ];
    public $userTypeOptions = [
        'admin' => 'Admin',
        'mod' => 'Moderator',
        'user' => 'User',
    ];
    public function render()
    {
        return view('livewire.admin.users');
    }
}
