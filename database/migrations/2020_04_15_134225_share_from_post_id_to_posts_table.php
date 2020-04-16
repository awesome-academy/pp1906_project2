<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShareFromPostIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('posts', 'share_from_post_id')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->bigInteger('share_from_post_id')->nullable()->after('type');
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
        if (Schema::hasColumn('posts', 'share_from_post_id')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('share_from_post_id');
            });
        }
    }
}
