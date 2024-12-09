<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'tag_id',
        'category_id'
    ];

    public function comments(): HasMany {

        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany {

        return $this->belongsToMany(Tag::class);
    }

    public function category(): BelongsTo {

        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }
   
}
