<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabFour extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        "book_name",
        "book_pages",
        "author_id",
    ];
    public function author()
    {        
        return $this->belongsTo(Author::class, 'author_id');
    }
}
