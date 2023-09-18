<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FeeInvoice extends Model
{
    use HasFactory;

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    public function FeesType()
    {
        return $this->belongsTo(FeesType::class,'fee_type');
    }

    public function Grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function Classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function fees()
    {
        return $this->belongsTo(Fees::class,'fee_type');
    }




}
