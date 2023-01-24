<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=["titulo", "slug", "contenido", "estado", "user_id", "imagen"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
