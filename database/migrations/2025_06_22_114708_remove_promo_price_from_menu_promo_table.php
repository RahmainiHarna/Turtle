<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2025_06_22_113315_add_photo_to_users_table.php
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('no_hp');
        });
========
       Schema::table('menu_promo', function (Blueprint $table) {
        $table->dropColumn('promo_price');
    });
>>>>>>>> main:database/migrations/2025_06_22_114708_remove_promo_price_from_menu_promo_table.php
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2025_06_22_113315_add_photo_to_users_table.php
        Schema::table('users', function (Blueprint $table) {
========
        Schema::table('menu_promo', function (Blueprint $table) {
>>>>>>>> main:database/migrations/2025_06_22_114708_remove_promo_price_from_menu_promo_table.php
            //
        });
    }
};
