<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->timestamps();
            $table->string('judul');
            $table->string('penulis');
            $table->integer('tahun')->nullable();
            $table->integer('isbn')->nullable();
            $table->string('sipnosis')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('id_rak_buku');
            $table->foreign('id_rak_buku')->references('id')->on('rak_bukus')->restrictOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
        Schema::table('bukus', function(Bluprint $table){
            $table->dropForeign(['id_rak_buku']);
            $table->dropColumn('id_rak_buku');
        });
    }
};
