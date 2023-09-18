<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fees extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title'];

    public function Grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function FeesType()
    {
        return $this->belongsTo(FeesType::class,'fee_type');
    }
}
