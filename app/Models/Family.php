<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Family extends Authenticatable
{

    use HasTranslations;
    use HasFactory;
    public $translatable = ['father_name','father_job','mother_name','mother_job'];
    protected $guarded=[''];

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }

}
