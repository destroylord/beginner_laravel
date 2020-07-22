<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','slug','body']; //-> jika orang lain yang input data

    // protected $guarded = []; -> jika menginputkan sendiri atau di dashboard


    // menampilkan data terahkirt
    public function scopeLatestFirst()
    {
        return $this->latest()->first();
    }

    public function scopeLatestPost()
    {
        return $this->latest()->get();
    }

    // Setiap post memiliki 1 kategori menggunakan belongsTo
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
