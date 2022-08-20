<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false; #disable timestamp insertion
    
    use HasFactory;

    public $fillable=[
        'name',
        'details'
    ];
}
