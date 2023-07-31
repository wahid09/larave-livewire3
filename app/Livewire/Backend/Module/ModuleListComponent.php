<?php

namespace App\Livewire\Backend\Module;

use App\Models\Module;
use App\Traits\withDataTable;
use Livewire\Component;
use Livewire\WithPagination;

class ModuleListComponent extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';

    public $name;

    public function addNewModule()
    {
        $this->dispatch('show-form');
    }
    public function saveModule(){
        dd($this->name);
    }
    public function render()
    {
        $modules = Module::query()
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->perPage);
        return view('livewire.backend.module.module-list-component', [
            'modules' => $modules
        ]);
    }
}
