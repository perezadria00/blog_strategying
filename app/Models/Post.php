<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content'

    ];

    public function comments(): HasMany {

        return $this->hasMany(Comment::class);
    }

    public function tags(): HasMany {

        return $this->hasMany(Tag::class);
    }

    public function categories(): BelongsTo {

        return $this->belongsTo(Category::class);
    }

    public function users(): BelongsTo {

        return $this->belongsTo(User::class);
    }
   
}
