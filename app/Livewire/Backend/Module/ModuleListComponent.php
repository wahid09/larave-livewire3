<?php

namespace App\Livewire\Backend\Module;

use App\Models\Module;
use Livewire\Component;
use App\Models\Permission;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Traits\withDataTable;
use Livewire\Attributes\Computed;
use App\Livewire\Forms\ModuleForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ModuleListComponent extends Component
{
    use WithPagination, withDataTable;

    protected $paginationTheme = 'bootstrap';
    public $name, $url, $sort_order, $parent_id;
    public $showMore = 0, $module;
    public ModuleForm $form;
    public $showEditModal = false, $subModule = false;

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
        $this->subModule = false;
        $this->showEditModal = false;
        $this->dispatch('show-form');
        //$this->dispatch('show-form');
        //$this->dispatch('open-modal', name: 'user-details');
    }

    public function saveModule()
    {

        $this->validate();
        $this->form->store();
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
    public function addNewSubModule(Module $module)
    {
        $this->subModule = true;
        $this->showEditModal = false;
        $this->module = $module;
        $this->dispatch('show-form');
    }
    public function createModule()
    {
        $this->validate();
        if ($this->subModule && $this->module) {
            DB::beginTransaction();
            try {
                $subModule = Module::create([
                    'name' => $this->form->name,
                    'parent_id' => $this->module->id,
                    'slug' => Str::slug(Str::singular($this->form->name)),
                    'sort_order' => $this->form->sort_order,
                    'is_active' => $this->form->is_active,
                    'url' => $this->form->url,
                    'icon' => $this->form->icon
                ]);
                $this->permission_automation($subModule->id, Str::singular($subModule->name));
                DB::commit();
                $this->reset();
                $this->dispatch('hide-form');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } else {
            DB::beginTransaction();
            try {
                $module = Module::create([
                    'name' => $this->form->name,
                    'slug' => Str::slug(Str::singular($this->form->name)),
                    'sort_order' => $this->form->sort_order,
                    'is_active' => $this->form->is_active,
                    'url' => $this->form->url,
                    'icon' => $this->form->icon
                ]);
                $this->single_permission($module->id, $module->name);
                DB::commit();
                $this->reset();
                $this->dispatch('hide-form');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }
        return redirect()->back();
    }
    public function deleteConfirm($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect()->back();
    }
    public function permission_automation($module_id, $module_name)
    {
        $prefix = ['index', 'create', 'update', 'delete'];
        for ($i = 0; $i < count($prefix); $i++) {
            $fields = [
                'module_id' => $module_id,
                'name' => str::singular($module_name) . ' ' . $prefix[$i],
                'slug' => str::slug(str::singular($module_name)) . '-' . $prefix[$i]
            ];

            $permissios = Permission::create($fields);
        }

        return $permissios;
    }

    public function single_permission($module_id, $module_name)
    {
        $fields = [
            'module_id' => $module_id,
            'name' => str::singular($module_name) . ' ' . 'Index',
            'slug' => str::slug(str::singular($module_name)) . '-' . 'index'
        ];
        $permissios = Permission::create($fields);
    }

    public function update_permission_automation($module_id, $module_name)
    {
        $prefix = ['index', 'create', 'update', 'delete'];
        $permissions_id = DB::table('permissions')
            ->select('id')
            ->where('module_id', $module_id)
            ->get();
        $id = json_decode(json_encode($permissions_id), true);

        for ($i = 0; $i < count($prefix); $i++) {
            $permission = Permission::findOrFail($id[$i]);

            $fields = [
                'module_id' => $module_id,
                'name' => str::singular($module_name) . ' ' . $prefix[$i],
                'slug' => str::slug(str::singular($module_name)) . '-' . $prefix[$i]
            ];

            DB::table('permissions')->where('id', $id[$i])->update($fields);
        }

        //return $permissios;
    }

    public function update_single_permission($module_id, $module_name)
    {
        $permissions_id = DB::table('permissions')
            ->select('id')
            ->where('module_id', $module_id)
            ->first();
        //dd($permissions_id);
        $fields = [
            'module_id' => $module_id,
            'name' => str::singular($module_name) . ' ' . 'Index',
            'slug' => str::slug(str::singular($module_name)) . '-' . 'index'
        ];
        DB::table('permissions')->where('id', $permissions_id->id)->update($fields);
    }

    public function render()
    {
        return view('livewire.backend.module.module-list-component', [
            'modules' => $this->modules
        ]);
    }
}