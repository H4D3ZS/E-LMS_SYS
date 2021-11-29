<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('fname');
            $table->string('email')->unique();
            $table->text('address');
            $table->string('roll_no');
            $table->string('phone');
            $table->bigInteger('cnic');
            $table->integer('semester');
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
        Schema::table('students', function (Blueprint $table) {
            Schema::dropIfExists('students');
        });
    }
}
