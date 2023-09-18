<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['class_name'];
    protected $fillable=['class_name','grade_id'];

    public function Grade()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

}
