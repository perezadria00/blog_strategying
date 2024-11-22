<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content'
    ];

    public function users(): BelongsTo{

        return $this->belongsTo(User::class);
    }

    public function posts(): BelongsTo {

        return $this->belongsTo(Post::class);
    }

}
