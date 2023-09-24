<?php

namespace App\Livewire\Forms;

use App\Models\Division;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Auth;

class DivisionForm extends Form
{

    #[Rule('required|min:3|max:255')]
    public $division_name = '';

    #[Rule('required|min:2|max:10')]
    public $division_code = '';

    #[Rule('nullable|unique:divisions,order')]
    public $order = '';

    public $parent_id = 0;
    public $is_active = false;
    public $division_address = '';
    public $created_by = '';
    public $updated_by = '';

    public function setDivision(Division $division)
    {
        $this->division_name = $division->division_name;
        $this->division_code = $division->division_code;
    }

    public function store()
    {
        //dd($this->all());
        Division::create([
            "division_name" => $this->division_name,
            "division_code" => $this->division_code,
            "order" => $this->order,
            "division_address" => $this->division_address,
            "created_by" => Auth::user()->id,
            "is_active" => $this->is_active
        ]);

        $this->reset();
    }
}