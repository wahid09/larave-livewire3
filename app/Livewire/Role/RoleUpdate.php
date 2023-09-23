<?php

namespace App\Livewire\Role;

use App\Models\Role;
use App\Models\Module;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleUpdate extends Component
{
    public $name;
    public $is_active;
    public $permissions = [];
    public $initial_permissions = [];
    public $role;

    public function mount($role)
    {
        $this->role = Role::with('permissions')->findOrFail($role);
        $this->name = $this->role->name;
        $this->is_active = $this->role->is_active;
        $ids = [];
        foreach ($this->role->permissions as $item){
            $ids[] = $item['id'];
        }
        $this->permissions = $ids;
    }
    public function updateRole()
    {
        //Gate::authorize('role-update');
//        $validatedData = Validator::make($this->state, [
//            'name' => 'required|min:3|unique:roles,name,' . $this->role->id,
//            'slug' => 'required|min:3|unique:roles,slug,' . $this->role->id,
//            'is_active' => 'required',
//        ])->validate();
        //dd($this->state['permissions']);
        //dd($this->permissions);
//        $ids = [];
//        foreach ($this->permissions as $item){
//            $ids[] = $item['id'];
//        }
        //dd($this->permissions);
        $this->role->update([
            'name' => $this->name,
            'slug' => str::slug($this->name),
            'is_active' => $this->is_active
        ]);
        $this->role->permissions()->sync($this->permissions);

        //$this->dispatchBrowserEvent('hide-form');
        $this->dispatch('toastr-success', ['message' => 'Role Added Successfully']);
        return redirect()->route('app.dev-console/roles');
    }
    
    public function render()
    {
        $modules = Module::with('permissions')->get();
        return view('livewire.role.role-update', [
            'modules' => $modules
        ]);
    }
}
