<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    public function project()
    {
        return Project::find($this->project_id);
    }

    public function reporter()
    {
        return Staff::find($this->staff_id);
    }
}
