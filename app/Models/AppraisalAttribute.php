<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class
AppraisalAttribute extends Model
{
    use HasFactory;
    protected $guarded;
    static $rules = [
        'attribute' => 'required',
        'description' => 'required',
    ];
}
