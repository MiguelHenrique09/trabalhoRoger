<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
       public function up(): void
    {
        Schema::create("comentario", function (Blueprint $table) {
            $table->id();
            $table->text("texto");
            $table->string("autor",60);
            $table->foreignId("postagem_id")->constrained("postagem")->onDelete("cascade");
            $table->softDeletes();
            $table->timestamps();

    });
}

    public function down(): void
    {
        Schema::dropIfExists("comentario");
    }
};
