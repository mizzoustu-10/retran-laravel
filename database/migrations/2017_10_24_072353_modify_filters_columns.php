<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFiltersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filters', function(Blueprint $table) {
            $table->dropColumn('options');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('city');
            $table->string('county');
            $table->string('bed');
            $table->string('bath');
            $table->string('minsqft');
            $table->string('maxsqft');
            $table->string('minlot');
            $table->string('maxlot');
            $table->string('units');
            $table->string('minmls');
            $table->string('maxmls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filters', function(Blueprint $table) {
            $table->json('options');
            $table->dropColumn('startdate');
            $table->dropColumn('enddate');
            $table->dropColumn('city');
            $table->dropColumn('county');
            $table->dropColumn('bed');
            $table->dropColumn('bath');
            $table->dropColumn('minsqft');
            $table->dropColumn('maxsqft');
            $table->dropColumn('minlot');
            $table->dropColumn('maxlot');
            $table->dropColumn('units');
            $table->dropColumn('minmls');
            $table->dropColumn('maxmls');
        });
    }
}
