<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('menu_promo', function (Blueprint $table) {
            $table->dropColumn('promo_price');
        });
    }

    public function down()
    {
        Schema::table('menu_promo', function (Blueprint $table) {
            $table->integer('promo_price')->nullable(); // sesuaikan tipe datanya
        });
    }
};
