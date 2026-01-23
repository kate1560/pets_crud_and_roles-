<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species'); // Dog, Cat, Bird, Fish, Reptile, Other
            $table->string('breed')->nullable();
            $table->unsignedInteger('age')->nullable(); // 0..100 validado en FormRequest
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('color')->nullable();
            $table->boolean('is_vaccinated')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('species');
            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
