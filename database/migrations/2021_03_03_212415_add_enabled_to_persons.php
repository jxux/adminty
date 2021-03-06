<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnabledToPersons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->boolean('enabled')->default(true)->after('percentage_perception');
            $table->index('enabled');
            $table->boolean('reportable')->default(true);
            $table->index('reportable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->dropIndex(['enabled']);
            $table->dropColumn('enabled');
            $table->dropIndex(['reportable']);
            $table->dropColumn('reportable');
        });
    }
}
