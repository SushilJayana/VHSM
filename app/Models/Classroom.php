<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use SoftDeletes;

    protected $table="hsm_classrooms";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','slug','status','education_level_id', 'subject_id', 
    'assigned_teacher_id','created_by','updated_by'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function educationLevel()
    {
        return $this->hasOne('App\Models\EducationLevel');
    }

    public function subject()
    {
        return $this->hasOne('App\Models\Subject');
    }

    public function User()
    {
        return $this->hasOne('App\Models\User');
    }
}
