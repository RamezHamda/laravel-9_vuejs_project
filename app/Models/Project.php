<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $appends = ['image_url'];

    const OPEN = 0;
    const COMPLETED = 1;
    const CLOSED = 2;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getImageUrlAttribute()
    {
        return 'https://ui-avatars.com/api/?name='.$this->client->name.'&background=random';
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
