<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bike_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->timestamps();
        });
        Schema::table('bikes', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('cost')->nullable();
            $table->foreign('category_id')->references('id')->on('bike_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bikes', function (Blueprint $table) {
            $table->dropForeign('bikes_bike_category_foreign');
            $table->dropColumn('bike_category');
        });
        Schema::dropIfExists('bike_categories');
    }
}
