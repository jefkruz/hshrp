<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    public $hidden = ['username', 'password'];

    public function fullname()
    {
        return$this->title. " ". $this->firstname. " ". $this->lastname;
    }
}
