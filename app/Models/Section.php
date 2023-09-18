<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['section_name'];

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_sections');
    }
    public function Grades()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }


}

