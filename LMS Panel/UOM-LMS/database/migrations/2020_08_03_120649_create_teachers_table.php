<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('rank')->nullable();
            $table->string('salary')->nullable();
            $table->string('teaching_semester');
            $table->string('dept');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('isVerified')->default(0);
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
        Schema::table('teachers', function (Blueprint $table) {
            Schema::dropIfExists('teachers');
        });
    }
}
