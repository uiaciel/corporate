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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('slug_id')->unique()->nullable();
            $table->string('slug_en')->unique()->nullable();
            $table->text('content_id')->nullable();
            $table->text('content_en')->nullable();
            $table->string('category')->default('About Us');
            $table->date('datepublish')->nullable();
            $table->string('pdf_id')->nullable();
            $table->string('pdf_en')->nullable();
            $table->integer('count')->default(1);
            $table->string('status')->default('Publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
