<?php

namespace App\Livewire\Forms;

use App\Models\Permission;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

class PermissionForm extends Form
{
    //public Permission $permission;
    #[Rule('required|min:3|max:255')]
    public $name = '';

    #[Rule('required')]
    public $module_id = '';

    #[Rule('required')]
    public $is_active = '';

    public function setPermission(Permission $permission)
    {
        $this->permission = $permission;
 
        $this->name = $permission->title;
        $this->module_id = $permission->module_id;
        $this->is_active = $permission->is_active;
    }

    public function store(){
        Permission::create([
            "name" => $this->name,
            "slug" => Str::of($this->name)->slug('-'),
            "module_id" => $this->module_id,
            "is_active" => $this->is_active
        ]);
    }
}
