<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $with = ['sender', 'receiver'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receive_id');
    }

//    protected function createdAt(): Attribute
//    {
//        return Attribute::make(
//                get: fn ($value) => $value != null ? $value->diffForHumans() : '' ,
//        );
//    }
}
