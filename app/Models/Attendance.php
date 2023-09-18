<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function Grades()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

}
