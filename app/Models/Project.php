<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function team()
    {
        $ids = explode(",", $this->team_ids);
        return Staff::whereIn('id', $ids)->get();
    }

    public function leader()
    {
        return Staff::find($this->leader_id);
    }

    public function department()
    {
        return Department::find($this->department_id);
    }
}
