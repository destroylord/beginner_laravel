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
}
