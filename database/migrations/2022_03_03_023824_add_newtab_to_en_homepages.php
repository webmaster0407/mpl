<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewtabToEnHomepages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('en_homepages', function (Blueprint $table) {
            $table->integer('newtab')->nullable(false)->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('en_homepages', function (Blueprint $table) {
            $table->dropColumn('newtab');
        });
    }
}
