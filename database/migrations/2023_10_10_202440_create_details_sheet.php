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
        Schema::create('detail_responsibility_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('id_item');
            $table->foreign('id_item')->references('id')->on('items')->onDelete('cascade');
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('id_responsibilitysheet');
            $table->foreign('id_responsibilitysheet')->references('id')->on('responsibility_sheets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_responsibility_sheets');
    }
};
