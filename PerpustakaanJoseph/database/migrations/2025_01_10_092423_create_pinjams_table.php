<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\on;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id('nopinjam');
            $table->string('idanggota');
            $table->string('kodebuku');
            $table->foreign('idanggota')->references('idanggota')->on('anggotas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kodebuku')->references('kodebuku')->on('bukus')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->double('denda')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
