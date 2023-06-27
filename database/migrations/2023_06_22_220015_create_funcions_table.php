<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionsTable extends Migration
{
    public function up()
    {
        Schema::create('funcions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha');
            $table->time('hora');
            $table->string('imagen');
            $table->integer('numero_reservas')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcions');
    }
}
