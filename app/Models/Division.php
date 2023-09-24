<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function parent()
    {
        return $this->hasOne('App\Models\Division', 'id', 'parent_id')->orderBy('order', 'asc');
    }

    public function children()
    {

        return $this->hasMany('App\Models\Division', 'parent_id', 'id')->active()->orderBy('order', 'asc');
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('order')->get();
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }
}