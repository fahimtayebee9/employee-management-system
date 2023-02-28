<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->integer('status')->default(1)->comment('1 for Active, 2 for Inactive');
            $table->string('field_1_label')->nullable();
            $table->string('field_1_type')->nullable();
            $table->string('field_2_label')->nullable();
            $table->string('field_2_type')->nullable();
            $table->string('field_3_label')->nullable();
            $table->string('field_3_type')->nullable();
            $table->string('field_4_label')->nullable();
            $table->string('field_4_type')->nullable();
            $table->string('field_5_label')->nullable();
            $table->string('field_5_type')->nullable();
            $table->string('field_6_label')->nullable();
            $table->string('field_6_type')->nullable();
            $table->string('field_7_label')->nullable();
            $table->string('field_7_type')->nullable();
            $table->string('field_8_label')->nullable();
            $table->string('field_8_type')->nullable();
            $table->string('field_9_label')->nullable();
            $table->string('field_9_type')->nullable();
            $table->string('field_10_label')->nullable();
            $table->string('field_10_type')->nullable();
            $table->string('field_11_label')->nullable();
            $table->string('field_11_type')->nullable();
            $table->string('field_12_label')->nullable();
            $table->string('field_12_type')->nullable();
            $table->string('field_13_label')->nullable();
            $table->string('field_13_type')->nullable();
            $table->string('field_14_label')->nullable();
            $table->string('field_14_type')->nullable();
            $table->string('field_15_label')->nullable();
            $table->string('field_15_type')->nullable();
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('id')->on('employee_roles')->onDelete('cascade');
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
        Schema::dropIfExists('task_forms');
    }
};
