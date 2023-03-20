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
        Schema::create('school_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')
            ->references('id')
            ->on('schools')
            ->onUpdate('cascade')
            ->onDelete('no action');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_admins');
    }
};
