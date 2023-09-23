<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
    public function parent()
    {
        return $this->hasOne('App\Models\Module', 'id', 'parent_id')->orderBy('sort_order', 'asc');
    }

    public function children()
    {

        return $this->hasMany('App\Models\Module', 'parent_id', 'id')->active()->orderBy('sort_order', 'asc');
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('sort_order')->get();
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }
}
