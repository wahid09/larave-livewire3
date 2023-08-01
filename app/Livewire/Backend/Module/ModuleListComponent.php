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

    public $name, $url, $sort_order, $parent_id;
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
        $module = Module::create([
            'name' => $this->name,
            'parent_id' => 0,
            'slug' => 'slug',
            'url' => 'url',
            'sort_order' => $this->sort_order
        ]);
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
