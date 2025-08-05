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
    Schema::create('recipes', function (Blueprint $table) {
        $table->id()->comment('Primary key: unique recipe ID');
        $table->string('recipes_name')->comment('Name or title of the recipe');
        $table->integer('recipes_views')->default(0)->comment('Number of views this recipe has');
        $table->string('recipes_file')->comment('File path or name of the uploaded recipe document');
        
        $table->enum('status', ['pending', 'approved', 'denied'])->default('pending')->comment('Recipe status for moderation');
        
        $table->foreignId('user_id')
              ->constrained('users')
              ->onDelete('cascade')
              ->comment('Foreign key: references the user who uploaded the recipe');

        $table->timestamps();
    });
}

};
