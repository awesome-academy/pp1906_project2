<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeColumnToSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('shares', 'type')) {
            Schema::table('shares', function (Blueprint $table) {
                $table->tinyInteger('type')->comment('1: public, 2: private, 3: only friends')->after('content');
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
        if (Schema::hasColumn('shares', 'type')) {
            Schema::table('shares', function (Blueprint $table) {
                $table->dropColumn('type');
            });
        }
    }
}
