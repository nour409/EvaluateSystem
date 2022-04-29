<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class user extends Authenticatable
{
    use HasFactory;
    protected $fillable=['name','email','username','role','password','photo'];
    public function course()
    {
        return $this->belongsToMany(course::class,'course_user');
    }
    public function quiz()
    {
        return $this->belongsToMany(Quiz::class,'user_quiz')
            ->withPivot('grade','attendance');
    }
}
