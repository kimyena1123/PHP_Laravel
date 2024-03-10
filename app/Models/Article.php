<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id']; //body, user_id만.
//    protected $guarded = ['id']; //id빼고 다
}
