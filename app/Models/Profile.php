<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded =['id'];
    protected $with = ['author'];

    Public function scopeFilter($query,array $filters){

        // if (isset($filters['search'])? $filters['search'] : false) {
        //     return $query->where('nama','like','%' . $filters['search'].'%')
        //     ->orWhere('created_at','like','%' . $filters['search'].'%')
        //     ->orWhere('nohp','like','%' .$filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama','like','%' . $search.'%')
                ->orWhere('created_at','like','%' . $search.'%')
                ->orWhere('nohp','like','%' .$search.'%');

        });   
        $query->when($filters['author']?? false, fn($query, $author) =>
        $query->whereHas('author', fn($query)=>
                $query->where('username', $author)
        
                )
        );

    }

    public function author()
    {
            return $this->belongsTo(User::class,'user_id');
            
    }
}
