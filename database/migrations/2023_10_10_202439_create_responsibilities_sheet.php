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
        Schema::create('responsibility_sheets', function (Blueprint $table) {
            // Fields
            $table->id();
            $table->timestamps();
            $table->string('series')->nullable();

            // Relations fields and relations references
            $table->unsignedBigInteger('id_responsible');
            $table->foreign('id_responsible')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsibility_sheets');
    }
};
