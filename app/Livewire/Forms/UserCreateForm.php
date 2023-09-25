<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Facades\Hash;

class UserCreateForm extends Form
{
    #[Rule('required|min:3|max:255|unique:users,username')]
    public $username = '';

    #[Rule('required|min:3|max:255')]
    public $full_name = '';

    #[Rule('required|min:3|max:255')]
    public $designation = '';

    #[Rule('required')]
    public $ba_no = '';

    #[Rule('required|min:3|max:255|unique:users,email')]
    public $email = '';

    #[Rule('required|confirmed|min:8')]
    public $password = '';
    public $password_confirmation = '';

    #[Rule('required')]
    public $division_id = '';

    #[Rule('required')]
    public $role_id = '';

    public $phone = '';

    public $address = '';

    public function store(){
        User::create([
            'role_id' => $this->role_id,
            'division_id' => $this->division_id,
            'username' => $this->username,
            'full_name' => $this->full_name,
            'designation' => $this->designation,
            'ba_no' => $this->ba_no,
            'email' => $this->email,
            'password'=> Hash::make($this->password),
            'phone' => $this->phone,
            'address' => $this->address
        ]);

        $this->reset();
    }
}
