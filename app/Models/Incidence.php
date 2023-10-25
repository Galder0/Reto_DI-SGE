<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidence extends Model{
    use HasFactory;
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function comentarios(): HasMany {
        return $this->hasMany(Comentario::class);
    }
    public function department():BelongsTo {
        return $this->belongsTo(Department::class);
    }
}
