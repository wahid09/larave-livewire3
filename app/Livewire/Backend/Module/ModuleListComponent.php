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
    public $showMore = 0;

    public function open($id)
    {
        $this->showMore = $id;
    }

    public function hideRow($id)
    {
        $this->showMore = 0;
    }

    public function addNewModule()
    {
        $this->dispatch('show-form');
    }

    public function saveModule()
    {
        dd($this->name);
    }

    public function render()
    {
        $modules = Module::with('children')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy('id', 'ASC')
            ->paginate($this->perPage);
        return view('livewire.backend.module.module-list-component', [
            'modules' => $modules
        ]);
    }
}
