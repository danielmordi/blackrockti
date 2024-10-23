<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfitCountToUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->float('totalProfitEarned')->nullable()->after('profit');
      $table->integer('profitCount')->default(1)->after('totalProfitEarned');
      $table->integer('investmentDuration')->after('profitCount')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('totalProfitEarned');
      $table->dropColumn('profitCount');
      $table->dropColumn('investmentDuration');
    });
  }
}
