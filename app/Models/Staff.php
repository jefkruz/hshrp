<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded;

    public function department()
    {
        return Department::find($this->department_id);
    }

    public function ministry()
    {
        return MinistryProfile::where('staff_id', $this->id)->first();
    }

    public function marital()
    {
        return MaritalProfile::where('staff_id', $this->id)->first();
    }

    public function bank()
    {
        return BankProfile::where('staff_id', $this->id)->first();
    }

    public function parental()
    {
        return ParentalProfile::where('staff_id', $this->id)->first();
    }
    public function work()
    {
        return ExperienceProfile::where('staff_id', $this->id)->first();
    }

    public function academicProfiles()
    {
        return $this->hasMany(AcademicProfile::class);
    }

    public function childrenProfiles()
    {
        return $this->hasMany(ChildrenProfile::class);
    }

    public function fullname()
    {
        return$this->title. " ". $this->firstname. " ". $this->lastname;
    }

    public function dept()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
