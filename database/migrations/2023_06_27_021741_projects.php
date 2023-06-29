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
        Schema::create('projects',function(Blueprint $table){
            $table->increments('id');
            $table->string('project_name',30);
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();;
            $table->enum('status',['complete','pendding', 'late', 'compensation']);
            $table->string('image',50);
            $table->longText('description');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
