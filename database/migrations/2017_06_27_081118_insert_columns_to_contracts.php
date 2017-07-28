<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertColumnsToContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->date('completionDate')->nullable()->after('date');
            $table->date('epCompletionDate')->nullable()->after('completionDate');
            $table->date('cCompletionDate')->nullable()->after('epCompletionDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table){
            $table->dropColumn('completionDate');
            $table->dropcolumn('epCompletionDate');
            $table->dropcolumn('cCompletionDate');
        });
    }
}
