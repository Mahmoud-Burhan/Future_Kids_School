<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
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
}
