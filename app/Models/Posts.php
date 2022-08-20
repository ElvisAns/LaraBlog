<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'title',
        'caption',
        'content',
        'image_url',
        'category',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function post_category(){
        return $this->belongsTo(Categories::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class,'post_id'); #"post_id" is the foreign key in the comment table
    }
}
