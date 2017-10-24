<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFiltersAddNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('filters', function($table)
        {
             $table->string('startdate')->nullable()->change();;
            $table->string('enddate')->nullable()->change();;
            $table->string('city')->nullable()->change();;
            $table->string('county')->nullable()->change();;
            $table->string('bed')->nullable()->change();;
            $table->string('bath')->nullable()->change();;
            $table->string('minsqft')->nullable()->change();;
            $table->string('maxsqft')->nullable()->change();;
            $table->string('minlot')->nullable()->change();;
            $table->string('maxlot')->nullable()->change();;
            $table->string('units')->nullable()->change();;
            $table->string('minmls')->nullable()->change();;
            $table->string('maxmls')->nullable()->change();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('filters', function($table)
        {
             $table->string('startdate')->nullable(false)->change();;
            $table->string('enddate')->nullable(false)->change();;
            $table->string('city')->nullable(false)->change();;
            $table->string('county')->nullable(false)->change();;
            $table->string('bed')->nullable(false)->change();;
            $table->string('bath')->nullable(false)->change();;
            $table->string('minsqft')->nullable(false)->change();;
            $table->string('maxsqft')->nullable(false)->change();;
            $table->string('minlot')->nullable(false)->change();;
            $table->string('maxlot')->nullable(false)->change();;
            $table->string('units')->nullable(false)->change();;
            $table->string('minmls')->nullable(false)->change();;
            $table->string('maxmls')->nullable(false)->change();;
        });
    }
}
