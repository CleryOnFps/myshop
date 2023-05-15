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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // on créé une colonne 'id' qui sera de type id et qui sera obligatoire
            $table->string('name', 50); // on créé une colonne 'name' qui sera de type string et qui sera obligatoire
            $table->text('icon')->nullable(); // on créé un colonne 'icon' qui sera de type text et qui pourra etre null
            $table->timestamps(); // on créé deux colonne created_at et updated_at qui sera de type timestamps et qui sera obligatoire 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
