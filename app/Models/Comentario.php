<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\postagem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Comentario extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "comentario";
    protected $fillable = ['postagem_id', 'autor', 'texto'];

    public function postagem(): BelongsTo
    {
        return $this->belongsTo(Postagem::class);
    }
}
