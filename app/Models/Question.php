<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected  $fillable =['body','quiz_id'];
    public $timestamps = false;


    public  function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function option()
    {
        return $this->hasMany(Option::class);
    }

}
