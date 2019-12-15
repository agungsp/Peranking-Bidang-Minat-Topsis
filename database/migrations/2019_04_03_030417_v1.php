<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class V1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('')) {

        }

        if (!Schema::hasTable('MasterUsers')) {
            Schema::create('MasterUsers', function (Blueprint $table) {
                $table->increments('IdMUser');
                $table->string('npm', 17)->unique();
                $table->string('password', 33);
                $table->string('nama', 255);
                $table->datetime('created_at');
                $table->datetime('updated_at');
            });
        }

        if (!Schema::hasTable('SaveNilais')) {
            Schema::create('SaveNilais', function (Blueprint $table) {
                $table->increments('IdSaveNilai');
                $table->integer('IdMUser');
                $table->datetime('created_at');
                $table->datetime('updated_at');
            });
        }

        if (!Schema::hasTable('SaveNilaiDs')) {
            Schema::create('SaveNilaiDs', function (Blueprint $table) {
                $table->increments('IdSaveNilaiD');
                $table->integer('IdSaveNilai');
                $table->integer('IdMAlternatif');
                $table->integer('IdMKriteria');
                $table->double('Nilai', 3, 2);
            });
        }

        if (!Schema::hasTable('SaveTopsiss')) {
            Schema::create('SaveTopsiss', function (Blueprint $table) {
                $table->increments('IdSaveTopsis');
                $table->integer('IdMUser');
                $table->datetime('created_at');
                $table->datetime('updated_at');
            });
        }

        if (!Schema::hasTable('SaveTopsisDs')) {
            Schema::create('SaveTopsisDs', function (Blueprint $table) {
                $table->increments('IdSaveTopsisD');
                $table->integer('IdSaveTopsis');
                $table->integer('IdMAlternatif');
                $table->double('Nilai', 3, 2);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MasterUsers');
        Schema::dropIfExists('SaveNilais');
        Schema::dropIfExists('SaveNilaiDs');
        Schema::dropIfExists('SaveTopsiss');
        Schema::dropIfExists('SaveTopsisDs');
    }
}
