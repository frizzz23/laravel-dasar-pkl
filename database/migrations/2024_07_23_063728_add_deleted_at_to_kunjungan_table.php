<?php
// database/migrations/xxxx_xx_xx_add_deleted_at_to_kunjungan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToKunjunganTable extends Migration
{
    public function up()
    {
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('kunjungan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
