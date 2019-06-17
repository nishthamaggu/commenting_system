<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    protected $table = 'replies';
    protected $fillable = ['reply', 'author'];
}
