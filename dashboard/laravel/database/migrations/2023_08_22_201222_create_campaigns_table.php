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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('administrator_id');
            $table->string('thumbnail');
            $table->text('title');
            $table->string('category');
            $table->text('explanation');
            $table->integer('point');
            $table->dateTime('period_start');
            $table->dateTime('period_end');
            $table->timestamps();

            $table->foreign('administrator_id')->references('id')->on('administrators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
