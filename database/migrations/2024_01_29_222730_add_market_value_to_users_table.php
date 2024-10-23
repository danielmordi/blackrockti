<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarketValueToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('total_value')->nullable();
            $table->string('market_value')->nullable();
            $table->string('yield')->nullable();
            $table->string('dividend')->nullable();
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
            $table->dropColumn('total_value');
            $table->dropColumn('market_value');
            $table->dropColumn('yield');
            $table->dropColumn('dividend');
        });
    }
}
