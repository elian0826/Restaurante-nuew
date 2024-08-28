<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name', 50)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps(); // Incluye campos de timestamp para created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

