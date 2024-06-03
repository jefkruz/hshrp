<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function goal()
    {
        return Goal::find($this->goal_id);
    }

    public function project()
    {
        return Project::find($this->project_id);
    }
}
