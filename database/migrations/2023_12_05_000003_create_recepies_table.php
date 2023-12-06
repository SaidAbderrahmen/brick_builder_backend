<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recepies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['breakfast', 'lunch', 'dinner', 'desert']);
            $table->double('energie');
            $table->double('sugar');
            $table->double('calories');
            $table->double('fat');
            $table->integer('serves');
            $table->integer('time');
            $table->text('instructions');
            $table->text('picture');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepies');
    }
};
