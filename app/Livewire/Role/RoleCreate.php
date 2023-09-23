<?php

namespace App\Livewire\Role;

use App\Models\Role;
use App\Models\Module;
use Livewire\Component;
use Illuminate\Support\Str;

class RoleCreate extends Component
{
    public $name;
    public $is_active;
    public $permissions = [];
    public $initial_permissions = [];

    protected $rules = [
        'name' => 'required|min:3',
        'is_active' => 'required',
    ];

    public function createRole()
    {
        //Gate::authorize('role-create');
        $this->validate();
        Role::create([
            'name' => $this->name,
            'slug' => str::slug($this->name),
            'is_active' => $this->is_active
        ])->permissions()->sync($this->permissions);

        //$this->dispatchBrowserEvent('hide-form');
        //$this->dispatchBrowserEvent('toastr-success', ['message' => 'Role Added Successfully']);
        return redirect()->route('app.dev-console/roles');
    }

    public function render()
    {
        $modules = Module::with('permissions')->get();
        return view('livewire.role.role-create', [
            'modules' => $modules
        ]);
    }
}
