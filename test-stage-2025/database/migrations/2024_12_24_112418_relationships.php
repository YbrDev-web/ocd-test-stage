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
        Schema::create('relationships', function (Blueprint $table) {
            $table->bigIncrements('id'); // PRIMARY KEY
            $table->unsignedBigInteger('created_by')->index(); // Foreign key or indexed column
            $table->unsignedBigInteger('parent_id')->index(); // Foreign key or indexed column
            $table->unsignedBigInteger('child_id')->index(); // Foreign key or indexed column
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
