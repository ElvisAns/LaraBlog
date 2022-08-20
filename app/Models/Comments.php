<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */   
     
    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
        'updated_at',
        'created_at'
    ];

    public function post(){
        return $this->belongsTo(Posts::class);
    }
}
