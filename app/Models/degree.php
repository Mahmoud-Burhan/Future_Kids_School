<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class degree extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    public function quizzes()
    {
        return $this->belongsTo(Quiz::class);
    }

}
