<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nombre_emple");
            $table->string("apepat_emple");
            $table->string("apemat_emple");
            $table->string("direccion_emple");
            $table->integer("docu_emple")->unique();
            $table->integer("telefono_emple");
            $table->integer("edad_emple");
            $table->string("cuenta_emple")->unique();
            $table->string("email_emple")->unique();
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
        Schema::dropIfExists('colaboradores');
    }
}
