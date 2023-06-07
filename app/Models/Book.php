<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'isbn',
        'year_released',
        'pages',
        'quantity',
        'description',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'book_publisher');
    }

    public function shelves()
    {
        return $this->belongsToMany(Shelf::class, 'book_shelf');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }
}