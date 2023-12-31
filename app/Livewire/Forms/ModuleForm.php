<?php

namespace App\Livewire\Forms;

use App\Models\Module;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

class ModuleForm extends Form
{
    #[Rule('required|min:3|max:255|unique:modules,name')]
    public $name = '';

    #[Rule('required|unique:modules,sort_order')]
    public $sort_order = '';

    #[Rule('required')]
    public $url = '';

    #[Rule('required')]
    public $icon = '';

    public $is_active = false;

    public function store()
    {
        //dd($this->all());
        Module::create([
            "name" => $this->name,
            "slug" => Str::of($this->name)->slug('-'),
            "sort_order" => $this->sort_order,
            "url" => $this->url,
            "is_active" => $this->is_active
        ]);

        $this->reset();
    }
}