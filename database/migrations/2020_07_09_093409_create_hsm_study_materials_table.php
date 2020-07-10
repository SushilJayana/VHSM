<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsmStudyMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsm_study_materials', function (Blueprint $table) {
            $table->id();            
            $table->string('name',25);
            $table->string('type',25);
            $table->string('location');
            $table->text('details')->nullable();
            $table->double('size')->nullable();
            
            $table->bigInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('hsm_classrooms');

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
        Schema::dropIfExists('hsm_study_materials');
    }
}
