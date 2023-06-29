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
        Schema::create('employees',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->string('full_name',20);
            $table->string('number_phone',15);
            $table->string('email',30);
            $table->timestamp('birthday')->nullable();
            $table->timestamp('created_at')->useCurrent();;
            $table->string('image',50);
            $table->string('bank_account',20);
            $table->string('bank_name',20);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
    }
};
