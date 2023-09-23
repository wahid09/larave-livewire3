<?php

namespace App\Livewire\Role;

use App\Models\Role;
use Livewire\Component;

class RoleList extends Component
{
    public function render()
    {
        $roles = Role::query()
            ->withCount('permissions')
            //->where('name', 'like', '%' . $this->searchTerm . '%')
            ->latest()->paginate(10);
        return view('livewire.role.role-list', [
            'roles' => $roles
        ]);
    }
}
