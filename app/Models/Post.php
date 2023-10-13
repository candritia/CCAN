<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
     
    // protected $fillable =['title','excerpt','body'];
    protected $guarded =['id'];
    protected $with = ['category','author'];

    Public function scopeFilter($query,array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
        return $query->where('title', 'like', '%' .$search. '%')
                     ->orWhere('body','like', '%' .$search. '%');

        });

        $query->when($filters['category'] ?? false, function($query, $category){
                return $query->whereHas('category', function($query) use ($category){
                        $query->where('slug', $category);

                });
        });
        
        $query->when($filters['author']?? false, fn($query, $author) =>
        $query->whereHas('author', fn($query)=>
                $query->where('username', $author)
        
                )
        );

    }
     // if (isset($filters['sarch']) ? $filters['search'] : false){
        //        return $query->where('title', 'like', '%' .$filters['search']. '%')
        //               ->orWhere('body','like', '%' .$filters['search']. '%');
        // }
    public function category()
    {
            return $this->belongsTo(Category::class);
            
    }

    
    public function perbaikan()
    {
        return $this->belongsTo(Perbaikan::class);
            
    }
    public function petugasan()
    {
            return $this->belongsTo(Petugasan::class);
            
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
            
    }
    public function statusa()
    {
        return $this->belongsTo(Statusa::class);
            
    }

    // public function petugass()
    // {
    //     return $this->belongsTo(Petugas::class);
    // }

    public function author()
    {
            return $this->belongsTo(User::class,'user_id');
            
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
