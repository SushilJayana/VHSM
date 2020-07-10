<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyMaterial extends Model
{
    use SoftDeletes;

    protected $table="hsm_study_materials";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','type','location','details','size',
    'classroom_id' ,'created_by','updated_by'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function classroom()
    {
        return $this->hasOne('App/Models/Classroom');
    }
}
