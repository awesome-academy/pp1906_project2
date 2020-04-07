<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguageColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'language')) {
            Schema::table('users', function (Blueprint $table) {
                $table->bigInteger('language')->after('cover')->default(config('user.language.en'))->comment('1: english, 2: vietnamese');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'language')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('language');
            });
        }
    }
}
