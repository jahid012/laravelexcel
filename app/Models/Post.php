<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $gruard = [];

    public function setTitleAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['title'] = $value;
    }
    public function getCreatedAtAttribute()
    {
       return Carbon::parse($this->attributes['created_at'])->diffForHumans()  ;
    }
}
