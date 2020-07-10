<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsmClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsm_classrooms', function (Blueprint $table) {
            $table->id();

            $table->string('name',25);
            $table->string('slug',25)->unique();
            $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');

            $table->bigInteger('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('hsm_education_levels');

            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('hsm_subjects');

            $table->bigInteger('assigned_teacher_id')->unsigned();
            $table->foreign('assigned_teacher_id')->references('id')->on('hsm_users');

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('hsm_classrooms');
    }
}
