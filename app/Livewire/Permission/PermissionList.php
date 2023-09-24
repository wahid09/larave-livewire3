<?php

namespace App\Livewire\Permission;

use App\Models\Module;
use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;
use App\Traits\withDataTable;

class PermissionList extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';

    public $showEditModal = false;
    public $state = [];
    public $permission;
    protected $queryString = ['searchTerm' => ['except' => '']];

    public function addNewPermission()
    {
        $this->dispatch('show-form');
    }
    public function render()
    {
        $modules = Module::active()->latest()->get();
        $permissions = Permission::query()
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.permission.permission-list', [
            'permissions' => $permissions,
            'modules' => $modules
        ]);
    }
}