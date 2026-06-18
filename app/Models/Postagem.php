<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postagem extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "postagem";
    protected $fillable = ['titulo', 'texto', 'autor', 'categoria_id'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'postagem_id');
    }
}