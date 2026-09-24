<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('llibres', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('titol');
            $table->string('autor');
            $table->text('descripcio');
            $table->text('categoria');
            $table->text('subcategoria');
            $table->integer('stock')->default(0); 
            $table->text('imatge')->nullable();
            $table->decimal('preu', 8, 2);
            $table->enum('tapa', ['dura', 'blanda'])->default('blanda');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llibres');
    }
};
