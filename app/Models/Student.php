<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasTranslations;
    use HasFactory;
    use SoftDeletes;

    public $translatable = ['name'];
    public $guarded=[];

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function Gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function Nationality()
    {
        return $this->belongsTo(Nationality::class,'nationalities_id');
    }

    public function Grades()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function Family()
    {
        return $this->belongsTo(Family::class);
    }

    public function Attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
