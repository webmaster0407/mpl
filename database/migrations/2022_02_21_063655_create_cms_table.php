<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('page_title');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->string('page_sub_title');
            $table->string('page_sub_group');
            $table->string('short_desc');
            $table->longText('description');
            $table->string('is_active')->default('no');
            $table->string('is_menu')->default('no');
            $table->string('is_header')->default('no');
            $table->string('is_footer')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms');
    }
}
