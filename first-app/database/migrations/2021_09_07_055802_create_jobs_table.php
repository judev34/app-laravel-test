<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // titre pour mission
            $table->text('description'); // description 
            $table->boolean('status')->default(1); // boolean avec status par défault pour dire si mission en ligne ou pas 
            $table->text('attachement')->nullable(); 
            $table->unsignedBigInteger('price'); 
            $table->foreignId('user_id')->constrained(); 
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
        Schema::dropIfExists('jobs');
    }
}
