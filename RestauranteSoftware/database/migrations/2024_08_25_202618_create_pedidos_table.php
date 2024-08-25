<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // Crea una columna `id` tipo BIGINT UNSIGNED
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null');
            $table->foreignId('mesa_id')->nullable()->constrained('mesas')->onDelete('set null');
            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP')); // Fecha de creación del pedido
            $table->decimal('total', 10, 2)->default(0.00); // Total del pedido
            $table->enum('estado', ['pendiente', 'en proceso', 'completado', 'cancelado']); // Estado del pedido
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
