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
        Schema::create('administrator_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('administrator_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_kana');
            $table->string('last_name_kana');
            $table->string('sex')->default('0');
            $table->date('date_of_birth')->default('2000-01-01');
            $table->timestamps();

            $table->foreign('administrator_id')
                  ->references('id')
                  ->on('administrators')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('administrator_accounts', function (Blueprint $table) {
            $table->dropForeign('administrator_accounts_administrator_id_foreign');
            $table->dropColumn('administrator_id');
        });
        Schema::dropIfExists('administrator_accounts');
    }
};
