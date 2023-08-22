<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')
                ->constrained()
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->foreignId('editor')
                ->constrained('users', 'id')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('kegiatan_siswas');
    }
};
