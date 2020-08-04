<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'candidate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact_number', 'gender', 'specialization', 'work_ex_year', 'candidate_dob', 'address', 'resume'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}