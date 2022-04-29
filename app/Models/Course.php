<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable=['name','photo','announce','description','credit_hours'];


    public function student()
    {
       return $this->belongsToMany(user::class,'course_user')->where('role','0');
    }
    public function doctor()
    {
       return $this->belongsToMany(user::class,'course_user')->where('role','1');
    }
    public  function quiz()
    {
        return $this->hasMany(Quiz::class);
    }


}
