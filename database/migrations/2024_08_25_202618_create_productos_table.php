<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Crea una columna `id` tipo BIGINT UNSIGNED
            $table->string('nombre'); // Nombre del producto
            $table->decimal('precio', 10, 2); // Precio del producto
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
