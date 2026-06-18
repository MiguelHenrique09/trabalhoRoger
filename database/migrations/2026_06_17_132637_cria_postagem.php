<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;  


return new class extends Migration
{
     public function up(): void
    {
        Schema::create("postagem", function (Blueprint $table) {
            $table->id();
            $table->text("texto");
            $table->string("autor",60);
            $table->string("titulo",60);
$table->foreignId('categoria_id')->nullable()->constrained('categoria')->onDelete('set null');         
   $table->softDeletes();
            $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("postagem");
    }
};
