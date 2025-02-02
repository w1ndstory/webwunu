<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = [
        "author_name",
        "author_surname",
        "author_birthdate",
        "author_phone",
        "author_national",
    ];
}
