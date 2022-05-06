<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('archivos')) {
            Schema::create('paginas', function (Blueprint $table) {
                $table->id();
                $table->integer('numero');
                $table->string('imagen', 200)->nullable();
                $table->string('folio', 200)->nullable();
                $table->dateTime('fecha_hora');
                $table->foreignId('archivo_id')->constrained('archivos');
                $table->timestamps();
                $table->softDeletes();
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
        Schema::table('paginas', function (Blueprint $table) {
            $table->dropForeign(['archivo_id']);
            $table->drop('paginas');
        });
    }
}
