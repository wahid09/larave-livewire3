<?php

namespace App\Livewire\UserMgt;

use App\Livewire\Forms\UserCreateForm;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Division;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public UserCreateForm $form;
    public $role_id = '';
    public $division_id = '';

    public function updated()
    {
        //$this->role_id = $this->form->role_id;
        //$this->division_id = $this->form->division_id;
    }
    public function createUser()
    {
        //dd($this->form);
        $this->validate();
        //$this->form->store();
        //dd($this->form->role_id);
        User::create([
            'role_id' => $this->form->role_id,
            'division_id' => $this->form->division_id,
            'username' => $this->form->username,
            'full_name' => $this->form->full_name,
            'designation' => $this->form->designation,
            'ba_no' => $this->form->ba_no,
            'email' => $this->form->email,
            'password'=> Hash::make($this->form->password),
            'phone' => $this->form->phone,
            'address' => $this->form->address
        ]);
        dd("here");
        $this->reset();
        $this->dispatch('toastr-success', ['message' => 'User Added Successfully']);
        return redirect()->route('app.user-management/user-mgts');
    }

    public function render()
    {
        $roles = Role::select('id', 'name')->latest()->active()->get();
        $divisions = Division::select('id', 'division_name')->latest()->active()->get();
        return view('livewire.user-mgt.user-create', [
            'divisions' => $divisions,
            'roles' => $roles
        ]);
    }
}
