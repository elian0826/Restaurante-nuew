<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->integer('cantidad')->check('cantidad > 0');
            $table->decimal('precio_unitario', 10, 2)->check('precio_unitario >= 0');
            $table->decimal('subtotal', 10, 2)->check('subtotal >= 0');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}

