<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffSessionData extends Model
{
    use HasFactory;
    public $staff;
    public $maritalProfile;

    public function __construct($staff, $maritalProfile)
    {
        $this->staff = $staff;
        $this->maritalProfile = $maritalProfile;
    }
}
