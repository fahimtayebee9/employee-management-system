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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->string('subject');
            $table->date('leave_from');
            $table->date('leave_to');
            $table->integer('leave_type')->default(3)->comment('1 = Full Day Paid Leave, 2 = Half Day Non-Paid Leave, 3 = Full Day Non-Paid Leave');
            $table->text('description');
            $table->unsignedBigInteger('approved_by_astmanager')->nullable();
            $table->unsignedBigInteger('approved_by_hr')->nullable();
            $table->integer('status_by_astmanager')->default(1)->comment('1 = Pending, 2 = Approved, 3 = Rejected');
            $table->integer('status_by_hr')->default(1)->comment('1 = Pending, 2 = Approved, 3 = Rejected');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('approved_by_astmanager')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by_hr')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('leave_applications');
    }
};
