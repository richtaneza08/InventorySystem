<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'categories_id'];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
