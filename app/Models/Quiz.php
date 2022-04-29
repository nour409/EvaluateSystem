<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    use HasFactory;
    protected  $fillable=['name','date','start_time','number_clock','course_id'];
    public $timestamps = false;


    public function course()
    {
        return $this->belongsTo('App\Models\course');
    }
    public  function  question()
    {
        return $this->hasMany(Question::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class,'user_quiz')
            ->withPivot('grade','attendance');
    }

}
