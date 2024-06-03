<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function leader()
    {
        $leader = Staff::find($this->leader_id);
        if($leader){
            $leader->fullname = $leader->title . ' ' . $leader->firstname . ' ' . $leader->lastname;
        }
        return $leader;
    }

    public function members()
    {
        return Staff::where('department_id', $this->id)->get();
    }

    public function projects()
    {
        $projects = Project::where('projects.department_id', $this->id)->get();

        return $projects;
    }

    public function subs()
    {
        return $this->belongsTo(SubDepartment::class, 'sub_id');
    }
}
