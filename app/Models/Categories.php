<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Posts;

class Categories extends Model
{
    public $timestamps = false; #disable timestamp insertion
    
    use HasFactory;

    public $fillable=[
        'name',
        'details'
    ];

    public function posts(){
        return $this->hasMany(Posts::class);
    }
}
