<?php

use App\Models\Address;
use App\Models\Breed;
use App\Models\Specie;
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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Specie::class, 'specie_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Breed::class, 'breed_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('genre');
            $table->string('age');
            $table->decimal('weight')->nullable();
            $table->string('size');
            $table->text('description')->nullable();
            $table->boolean('is_active');
            $table->string('slug');
            $table->string('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};