<?php

namespace App\Livewire\Permission;

use App\Livewire\Forms\PermissionForm;
use App\Models\Module;
use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;
use App\Traits\withDataTable;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;

class PermissionList extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';

    public $showEditModal = false;
    public $state = [];
    public $permission;
    protected $queryString = ['searchTerm' => ['except' => '']];

    #[Rule('required')]
    public $module_id = '';

    #[Rule('required|min:3|max:255')]
    public $name = '';
    #[Rule('required')]
    #[Computed]
    public $is_active;


    protected $listeners = [
        'delete'
    ];
    public function mount()
    {
        //$this->name = $this->permission->name;
    }
    public function addNewPermission()
    {
        $this->showEditModal = false;
        $this->dispatch('show-form');
    }
    public function createPermission()
    {
        $this->validate();
        Permission::create([
            "name" => $this->name,
            "slug" => Str::of($this->name)->slug('-'),
            "module_id" => $this->module_id,
            "is_active" => $this->is_active
        ]);
        $this->reset();
        $this->dispatch('hide-form');
        $this->dispatch('toastr-success', ['message' => 'Permission Added Successfully']);
        return redirect()->back();
    }
    public function editPermission(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $this->permission->name;
        $this->module_id = $this->permission->module_id;
        $this->is_active = $this->permission->is_active;
        $this->showEditModal = true;
        $this->dispatch('show-form');
    }
    public function updatePermission()
    {
        $this->validate();
        $this->permission->update([
            "name" => $this->name,
            "slug" => Str::of($this->name)->slug('-'),
            "module_id" => $this->module_id,
            "is_active" => $this->is_active
        ]);
        $this->dispatch('hide-form');
        $this->dispatch('toastr-success', ['message' => 'Permission Updated Successfully']);
        return redirect()->back();
    }
    public function deleteConfirm($id)
    {
        //Gate::authorize('permission-delete');
        $this->dispatch('delete-confirm', [
            'id' => $id,
        ]);
    }
    public function delete($permission)
    {
        $this->permission->delete();
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