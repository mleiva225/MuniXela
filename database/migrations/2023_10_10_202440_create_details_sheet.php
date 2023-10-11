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
        Schema::create('details_sheet', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('id_item');
            $table->foreign('id_item')->references('id')->on('items')->onDelete('cascade');
            $table->float('unit_value')->nullable();
            $table->float('value')->nullable();
            $table->float('low_value')->nullable();
            $table->string('created_by')->nullable();
            $table->string('lastname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_sheet');
    }
};
