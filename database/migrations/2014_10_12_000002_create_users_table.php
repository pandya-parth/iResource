<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');;
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('last_name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->enum('role', ['admin','employee','interviewer'])->default('interviewer');
            $table->string('profile_photo', 255)->nullable();
            $table->enum('gender', ['male','female','other'])->default('male');
            $table->integer('age')->default(0);
            $table->date('dob')->default(Carbon::now());
            $table->string('address', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('time_zone', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('pincode', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->tinyInteger('active')->default(0);
            $table->string('file', 255)->nullable();
            $table->string('date_of_today', 255)->nullable();
            $table->string('post_applied', 255)->nullable();
            $table->string('reference', 255)->nullable();
            $table->string('notice_period', 255)->nullable(); 
            $table->string('nationality', 255)->nullable();
            $table->string('blood_group', 255)->nullable();
            $table->string('expected_ctc', 255)->nullable();
            $table->string('current_ctc', 255)->nullable();
            $table->text('res_address')->nullable();
            $table->text('per_address')->nullable();
            $table->text('admin_review', 255)->nullable();
            $table->text('team_lead_review', 255)->nullable();
            $table->integer('admin_per')->default(0);
            $table->integer('team_lead_per')->default(0);
            $table->enum('marital_status', ['married','unmarried','widow'])->default('married');
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
        Schema::dropIfExists('users');
    }
}
