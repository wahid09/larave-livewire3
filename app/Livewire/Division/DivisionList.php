<?php

namespace App\Livewire\Division;

use App\Livewire\Forms\DivisionForm;
use App\Models\Division;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Traits\withDataTable;
use Auth;
use Livewire\Attributes\Rule;

class DivisionList extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';
    public $showMore = 0;
    public $showEditModal = false, $subModule = false, $division;

    #[Rule('required|min:3|max:255')]
    public $division_name = '';

    #[Rule('required|min:2|max:10')]
    public $division_code = '';

    public $order = '';
    public $parent_id = 0;
    public $is_active = 0;
    public $division_address = '';
    public $created_by = '';
    public $updated_by = '';


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
        $this->reset();
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
                "division_name" => $this->division_name,
                'parent_id' => $this->division->id,
                "division_code" => $this->division_code,
                "order" => $this->order,
                "division_address" => $this->division_address,
                "created_by" => Auth::user()->id,
                "is_active" => $this->is_active
            ]);
            $this->dispatch('hide-form');
            $this->dispatch('toastr-success', ['message' => 'Unit Added Successfully']);
            return redirect()->back();
        } else {
            $this->validate();
            Division::create([
                "division_name" => $this->division_name,
                "division_code" => $this->division_code,
                "order" => $this->order,
                "division_address" => $this->division_address,
                "created_by" => Auth::user()->id,
                "is_active" => $this->is_active
            ]);
            $this->reset();
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
        $this->division_name = $this->division->division_name;
        $this->division_code = $this->division->division_code;
        $this->order = $this->division->order;
        $this->division_address = $this->division->division_address;
        $this->is_active = $this->division->is_active;
        //dd($this->is_active);
        $this->dispatch('show-form');
    }
    public function editUnit(Division $division)
    {
        $this->subModule = false;
        $this->showEditModal = true;
        $this->division = $division;
        $this->division_name = $this->division->division_name;
        $this->division_code = $this->division->division_code;
        $this->order = $this->division->order;
        $this->division_address = $this->division->division_address;
        $this->is_active = $this->division->is_active;
        //dd($this->is_active);
        $this->dispatch('show-form');
    }
    public function updateDivision()
    {
        $this->validate();
        $this->division->update([
            "division_name" => $this->division_name,
            "division_code" => $this->division_code,
            "order" => $this->order,
            "division_address" => $this->division_address,
            "created_by" => Auth::user()->id,
            "is_active" => $this->is_active
        ]);
        $this->reset();
        $this->dispatch('hide-form');
        $this->dispatch('toastr-success', ['message' => 'Division Updated Successfully']);
        return redirect()->back();
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