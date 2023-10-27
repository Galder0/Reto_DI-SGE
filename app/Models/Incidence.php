<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incidence extends Model{

    protected $fillable = [
        'title',
        'description',
        // Add 'category_id' to the fillable attributes
        'category_id',
        // Add other fillable attributes as needed
    ];

    use HasFactory;
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
    public function department():BelongsTo {
        return $this->belongsTo(Department::class);
    }
}
