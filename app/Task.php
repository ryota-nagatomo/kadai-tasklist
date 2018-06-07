<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'user_id', 'status', 'due', 'importance'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}