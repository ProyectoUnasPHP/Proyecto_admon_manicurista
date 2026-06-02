<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('manicuristas', function (Blueprint $table) {
            // Borra la relación con la tabla vieja
            $table->dropForeign('manicuristas_id_usuario_foreign');

            // Crea la relación con la tabla nueva
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('manicuristas', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }
};
