<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugasan extends Model
{
    use HasFactory;
    protected $table = "petugasans";
    protected $guarded =['id'];

    public function posts()
    {
        
        return $this->hasMany(Post::class);

        
    }
    
}
