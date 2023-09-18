<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['name'];
    protected $guarded=[];

    public function Grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function Teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function Subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function Section()
    {
        return $this->belongsTo(Section::class);
    }

    public function degrees()
    {
        return $this->hasMany('App\Models\degree','quizzes_id');
    }
}
