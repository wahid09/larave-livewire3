<?php

namespace App\Livewire\Backend\Module;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\withDataTable;
use App\Livewire\Forms\ModuleForm;
use Livewire\Attributes\Computed;

class ModuleListComponent extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';

    public $name, $url, $sort_order, $parent_id;
    public $showMore = 0;
    public ModuleForm $form;

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
        //$this->dispatch('open-modal', name: 'user-details');
    }

    public function saveModule()
    {
        $this->form->store();
        $this->dispatch('hide-form');
        $this->modules();
        return redirect()->back();
    }

    #[Computed] 
    public function modules(){
        return Module::with('children')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->orderBy('id', 'ASC')
            ->paginate($this->perPage);
    }

    public function render()
    {
        //$modules = Module::with('children')
            //->where('name', 'like', '%' . $this->searchTerm . '%')
            //->orderBy('id', 'ASC')
            //->paginate($this->perPage);
        return view('livewire.backend.module.module-list-component', [
            'modules' => $this->modules
        ]);
    }
}
