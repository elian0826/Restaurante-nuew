<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    public function up()
    {
        // Verifica si la tabla no existe antes de crearla
        if (!Schema::hasTable('detalle_pedidos')) {
            Schema::create('detalle_pedidos', function (Blueprint $table) {
                $table->id(); // Columna `id` tipo BIGINT UNSIGNED
                $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
                $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
                $table->integer('cantidad')->unsigned();
                $table->decimal('precio_unitario', 10, 2);
                $table->decimal('subtotal', 10, 2);
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
