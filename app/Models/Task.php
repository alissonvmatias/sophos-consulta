<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    Use HasFactory;
    protected $guarded = ['id'];
    
    public function atendimentos()
    {
        return $this->hasMany(Atendimentos::class);
    }
}