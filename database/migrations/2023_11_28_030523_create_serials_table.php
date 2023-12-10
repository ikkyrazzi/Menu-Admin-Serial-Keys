<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_proses', 50);
            $table->foreignUuid('kode_buku');
            $table->foreignUuid('kode_aplikasi');
            $table->string('serial', 50);
            $table->integer('active')->default(0);
            $table->string('active_token')->nullable();
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
        Schema::dropIfExists('serials');
    }
}
