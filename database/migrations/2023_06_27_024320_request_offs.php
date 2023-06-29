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
        Schema::create('request_offs',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->text('reason');
            $table->text('note');
            $table->string('reviewer',20);
            $table->enum('status', ['approve', 'refuse']);
            $table->foreign('employee_id')->references('id')->on('employees');
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
