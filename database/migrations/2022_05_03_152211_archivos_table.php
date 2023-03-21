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
        if (Schema::hasTable('tipo_documentos') && Schema::hasTable('secciones') && Schema::hasTable('users')) {
            Schema::create('archivos', function (Blueprint $table) {
                $table->id();
                $table->string('fondo', 50);
                $table->foreignId('seccion_id')->constrained('secciones');
                $table->string('serie', 50);
                $table->string('autor', 50)->nullable()->comment('autor');
                $table->string('descripcion', 200)->nullable()->comment('(asunto o CITE)');
                $table->date('fecha_inicio');
                $table->date('fecha_finalizacion');
                $table->string('folio', 50);
                $table->string('volumen', 50);
                $table->string('ubicacion', 50);
                $table->foreignId('user_id')->constrained('users');
                $table->dateTime('fecha_hora')->comment('fecha de registro en sistema');
                $table->foreignId('tipo_documento_id')->constrained('tipo_documentos');
                // $table->string('titulo', 100);
                // $table->date('fecha_documento')->nullable();
                // $table->string('resolucion_ministerial', 45)->nullable();
                // $table->string('cife', 45)->nullable();
                // $table->date('fecha_emision')->nullable();
                // $table->integer('ano')->comment('Año')->nullable();
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
