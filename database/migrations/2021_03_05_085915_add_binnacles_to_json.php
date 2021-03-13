<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBinnaclesToJson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binnacles', function (Blueprint $table) {
            $table->json('user')->after('user_id');
            $table->json('client')->after('client_id');
            $table->json('category')->after('category_id');
            $table->json('service')->after('service_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::table('binnacles', function (Blueprint $table) {
            //
        });
    }
}
