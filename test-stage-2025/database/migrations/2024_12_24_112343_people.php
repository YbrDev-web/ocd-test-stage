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
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id'); // PRIMARY KEY
            $table->unsignedBigInteger('created_by')->index(); // Foreign key or indexed column
            $table->string('first_name', 255)->collation('utf8mb4_unicode_ci');
            $table->string('last_name', 255)->collation('utf8mb4_unicode_ci');
            $table->string('birth_name', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('middle_names', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->date('date_of_birth')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
