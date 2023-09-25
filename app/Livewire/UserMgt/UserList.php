<?php

namespace App\Livewire\UserMgt;

use App\Models\Division;
use App\Models\Role;
use App\Models\User;
use App\Traits\withDataTable;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination, withDataTable;
    protected $paginationTheme = 'bootstrap';

    public $showEditModal = false;

    public function render()
    {
        $users = User::query()
            ->where('username', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.user-mgt.user-list', [
            'users' => $users
        ]);
    }
}