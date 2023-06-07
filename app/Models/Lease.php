<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lease';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id',
        'user_id',
        'lease_time',
        'return_time',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'lease_time' => 'datetime',
        'return_time' => 'datetime',
    ];

    /**
     * Get the book associated with the lease.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the user associated with the lease.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}