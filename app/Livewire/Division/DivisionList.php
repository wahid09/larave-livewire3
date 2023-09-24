<?php

namespace App\Livewire\Division;

use App\Livewire\Forms\DivisionForm;
use App\Models\Division;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Traits\withDataTable;
use Auth;

class DivisionList extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';
    public $showMore = 0;
    public $showEditModal = false, $subModule = false, $division;

    public DivisionForm $form;


    public function open($id)
    {
        $this->showMore = $id;
    }

    public function hideRow($id)
    {
        $this->showMore = 0;
    }
    public function mount()
    {
        //dd($this->division);
        //$this->form->setDivision($this->division);
        //$this->form->division_name = $division->division_name;
    }

    public function addNewDivision()
    {
        $this->subModule = false;
        $this->showEditModal = false;
        $this->dispatch('show-form');
    }
    public function addNewSubDivision(Division $division)
    {
        $this->subModule = true;
        $this->showEditModal = false;
        $this->division = $division;
        $this->dispatch('show-form');
    }
    public function createDivision()
    {
        if ($this->subModule && $this->division) {
            $this->validate();
            Division::create([
                "division_name" => $this->form->division_name,
                'parent_id' => $this->division->id,
                "division_code" => $this->form->division_code,
                "order" => $this->form->order,
                "division_address" => $this->form->division_address,
                "created_by" => Auth::user()->id,
                "is_active" => $this->form->is_active
            ]);
            $this->dispatch('hide-form');
            $this->dispatch('toastr-success', ['message' => 'Unit Added Successfully']);
            return redirect()->back();
        } else {
            $this->form->store();
            $this->dispatch('hide-form');
            $this->dispatch('toastr-success', ['message' => 'Division Added Successfully']);
            return redirect()->back();
        }
    }
    public function editDivision(Division $division)
    {
        $this->subModule = false;
        $this->showEditModal = true;
        $this->division = $division;
        $this->dispatch('show-form');
    }
    public function deleteConfirm($id)
    {
        $module = Division::findOrFail($id);
        $module->delete();
        $this->dispatch('toastr-success', ['message' => 'Division Deleted Successfully']);
        return redirect()->back();
    }

    #[Computed]
    public function divisions()
    {
        return Division::with('children')
            ->where('division_name', 'like', '%' . $this->searchTerm . '%')
            ->where('parent_id', 0)
            ->orderBy('id', 'ASC')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('livewire.division.division-list', [
            'divisions' => $this->divisions
        ]);
    }
}