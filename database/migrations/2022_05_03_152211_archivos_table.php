<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('tipo_documentos') && Schema::hasTable('departamentos') && Schema::hasTable('users')) {
            Schema::create('archivos', function (Blueprint $table) {
                $table->id();
                $table->string('titulo', 100);
                $table->dateTime('fecha_hora');
                $table->string('descripcion', 200)->nullable();
                $table->date('fecha_documento')->nullable();
                $table->string('resolucion_ministerial', 45)->nullable();
                $table->string('cife', 45)->nullable();
                $table->date('fecha_emision')->nullable();
                $table->integer('ano')->comment('Año')->nullable();
                $table->foreignId('departamento_id')->constrained('departamentos');
                $table->foreignId('tipo_documento_id')->constrained('tipo_documentos');
                $table->foreignId('user_id')->constrained('users');
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
        Schema::table('archivos', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['tipo_documento_id']);
            $table->dropForeign(['user_id']);
            $table->drop('archivos');
        });
    }
}
