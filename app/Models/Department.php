<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
    public function incidences(): HasMany {
        return $this->hasMany(Incidence::class);
    }
    protected $fillable = [
        'depname',
        // other fields...
    ];
}
