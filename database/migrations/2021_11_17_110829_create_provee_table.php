<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("razon_social");
            $table->string("tipodocu_provee");
            $table->string("docu_provee")->unique();
            $table->string("direccion_provee");            
            $table->integer("telefono_provee");
            $table->string("cuenta1_provee")->unique();
            $table->string("cuenta2_provee")->unique()->nullable;
            $table->string("email_provee")->unique()->nullable;
            $table->string("referencia_provee")->nullable;
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
        Schema::dropIfExists('proveedores');
    }
}
