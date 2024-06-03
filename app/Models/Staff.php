<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    public function department()
    {
        return Department::find($this->department_id);
    }


    public function dept()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
