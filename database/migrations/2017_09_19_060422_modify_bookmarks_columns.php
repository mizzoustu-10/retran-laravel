<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBookmarksColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookmarks', function(Blueprint $table){
            $table->renameColumn('userId', 'user_id');
            $table->renameColumn('recordId', 'count2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookmarks', function(Blueprint $table){
            $table->renameColumn('user_id', 'userId');
            $table->renameColumn('count2', 'recordId');
        });
    }
}
