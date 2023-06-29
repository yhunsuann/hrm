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
        Schema::create('attendances',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->timestamp('attendances_date');
            $table->time('check_in');
            $table->time('check_out');
            $table->enum('status', ['present', 'late', 'leave']);
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
