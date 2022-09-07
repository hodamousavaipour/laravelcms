<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocab_meanings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vocab_id');
            $table->foreign('vocab_id')->references('id')->on('vocabs')->onDelete('cascade');
            $table->enum('type',['noun','adjective','verb','adverb','pronoun','preposition', 'conjunction','interjection']);
            $table->string('meaning')->nullable();
            $table->string('sample')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocab_meanings');
        
    }
};
