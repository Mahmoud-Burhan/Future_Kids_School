<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded=[''];
    use SoftDeletes;
    public function Student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function Grade()
    {
        return $this->belongsTo(Grade::class,'from_grade');
    }
    public function Classroom()
    {
        return $this->belongsTo(Classroom::class,'from_classroom');
    }
    public function Section()
    {
        return $this->belongsTo(Section::class,'from_section');
    }

    public function NewGrade()
    {
        return $this->belongsTo(Grade::class,'to_grade');
    }
    public function NewClassroom()
    {
        return $this->belongsTo(Classroom::class,'to_classroom');
    }
    public function NewSection()
    {
        return $this->belongsTo(Section::class,'to_section');
    }
}
