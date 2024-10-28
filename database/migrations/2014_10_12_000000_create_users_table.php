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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->text('two_factor_secret')->nullable();
      $table->text('two_factor_recovery_codes')->nullable();
      $table->bigInteger('role_id')->unsigned()->default(2);
      $table->boolean('is_blocked')->default(0)->nullable();
      $table->string('package')->nullable();
      $table->string('account')->nullable();
      $table->float('wallet_balance')->nullable(); // multip by 100 million
      $table->float('bonus')->nullable();
      $table->string('total_profit')->nullable();
      $table->string('withdrawal_limit')->nullable();
      $table->string('kyc')->nullable();
      $table->string('isKycUploaded')->default('false')->nullable();
      $table->string('is_activated')->default('false')->nullable();
      $table->foreignId('referrer_id')->constrained('users')->cascadeOnDelete();
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
