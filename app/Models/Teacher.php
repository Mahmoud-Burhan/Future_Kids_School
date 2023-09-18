<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{

    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];

    public function Gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function Specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_sections');
    }
}
