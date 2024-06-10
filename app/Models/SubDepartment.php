<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    use HasFactory;
    static $rules = [
        'name' => 'required',
    ];
    public function hod()
    {
        $leader = Staff::find($this->hod_id);
        if($leader){
            $leader->fullname = $leader->title . ' ' . $leader->firstname . ' ' . $leader->lastname;
        }
        return $leader;
    }
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
