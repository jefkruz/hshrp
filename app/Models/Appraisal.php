<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    use HasFactory;

    public function period()
    {
        $time = strtotime($this->year . '-' . $this->month);
        return date("F Y", $time);
    }

    public function staff()
    {
        $n = Staff::find($this->staff_id);
        return $n->title . ' ' . $n->firstname . ' ' . $n->lastname;
    }

    public function appraiserName()
    {
        $n = ($this->from_director == 'yes')
            ? Director::first()
            : Staff::find($this->appraised_by);

        return $n->title . ' ' . $n->firstname . ' ' . $n->lastname;
    }
}
