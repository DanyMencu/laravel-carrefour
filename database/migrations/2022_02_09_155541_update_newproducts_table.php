<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNewproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //FK Column
            $table->unsignedBigInteger('type_id')->nullable()->after('category_id');

            //FK constrain constrain 
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
}
