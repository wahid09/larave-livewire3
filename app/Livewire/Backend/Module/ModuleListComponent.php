<?php

namespace App\Livewire\Backend\Module;

use App\Models\Module;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\withDataTable;
use App\Livewire\Forms\ModuleForm;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ModuleListComponent extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';

    public $name, $url, $sort_order, $parent_id;
    public $showMore = 0;
    public ModuleForm $form;
    //public $form = [];

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
        // $validatedData = Validator::make($this->form, [
        //     'name' => 'required|min:3|max:255|unique:modules,name',
        //     'sort_order' => 'required|unique:modules,sort_order',
        //     'is_active' => 'required',
        //     'url' => 'required',
        //     'icon' => 'required',
        // ])->validate();
        $this->form->store();
        // Module::create([
        //     'name' => $this->form['name'],
        //     'slug' => Str::slug(Str::singular($this->form['name'])),
        //     'sort_order' => $this->form['sort_order'],
        //     'is_active' => $this->form['is_active'],
        //     'url' => $this->form['url'],
        //     'icon' => $this->form['icon']
        // ]);

        $this->reset();
        $this->dispatch('hide-form');
        $this->modules();
        return redirect()->back();
    }

    #[Computed]
    public function modules()
    {
        return Module::with('children')
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->where('parent_id', 0)
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