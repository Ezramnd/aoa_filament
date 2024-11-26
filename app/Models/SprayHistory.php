<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprayHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'category',
        'status',
    ];
}