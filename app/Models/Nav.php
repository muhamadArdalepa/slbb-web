<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dropdown()
    {
        return $this->hasMany(Nav::class,'parent_id');      
    }
}
