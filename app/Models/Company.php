<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'inn',
        'info_description',
        'general_manager',
        'address',
        'telephone'
    ];
}
