<?php

namespace App\Models;

use App\Enums\TypeAttendEnum;
use App\Enums\StatusClientEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atendimentos extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute($value)
    {
        return StatusClientEnum::from($value); 
    }

 
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = StatusClientEnum::from($value)->value; 
    }


    public function getTypeAttendAttribute($value)
    {
        return TypeAttendEnum::from($value); 
    }

    public function setTypeAttendAttribute($value)
    {
        $this->attributes['type_attend'] = TypeAttendEnum::from($value)->value;
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
