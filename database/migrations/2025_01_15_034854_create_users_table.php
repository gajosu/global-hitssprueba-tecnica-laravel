<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->unique();
            $table->string('primerNombre');
            $table->string('segundoNombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->unsignedBigInteger('idDepartamento');
            $table->unsignedBigInteger('idCargo');
            $table->timestamps();

            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->foreign('idCargo')->references('id')->on('cargos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
