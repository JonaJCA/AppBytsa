<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_fact');
            $table->string('descripcion_fact');            
            $table->decimal('sub_total', 8, 2);
            $table->decimal('igv_fact', 8, 2);
            $table->decimal('total_fact', 8, 2);
            $table->decimal('detraccion', 8, 2)->nullable();
            $table->decimal('fondo_garantia', 8, 2)->nullable();
            $table->decimal('depositado', 8, 2);
            $table->string('estado');
            $table->date('fecha_presenta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
