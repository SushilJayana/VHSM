<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsm_users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('username', 50)->unique();
            $table->string('email',50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');
            $table->timestamp('disabled_at')->nullable();

            $table->string('user_type',50);
            $table->enum('gender',['MALE','FEMALE','OTHER']);
            $table->string('photo', 25)->nullable();
            $table->string('address',100);
            $table->bigInteger('contact');
            $table->string('guardian_name',50)->nullable();
            $table->bigInteger('guardian_contact')->nullable();
            $table->string('guardian_address',100)->nullable();
            $table->string('guardian_occupation',30)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();

            $table->rememberToken();
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
        Schema::dropIfExists('hsm_users');
    }
}
