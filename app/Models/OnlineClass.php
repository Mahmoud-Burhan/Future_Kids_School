<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    use HasFactory;
    protected $guarded='';

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

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
