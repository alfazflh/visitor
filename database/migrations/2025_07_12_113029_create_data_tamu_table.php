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
        Schema::create('data_tamu', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp')->useCurrent();
            $table->string('nama_tamu', 100)->nullable();
            $table->string('perusahaan', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->string('unit', 100)->nullable();
            $table->string('pegawai', 100)->nullable();
            $table->text('apd')->nullable();
            $table->text('keperluan')->nullable();
            $table->string('ktp', 100)->nullable();
            $table->string('kendaraan', 100)->nullable();
            $table->string('name_tag', 50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('induksi', 20)->nullable();
            $table->text('link_foto')->nullable();
            $table->enum('status', ['check-in', 'check-out'])->default('check-in');
            $table->timestamp('jam_checkout')->nullable();
            $table->timestamps(); // created_at & updated_at Laravel
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tamu');
    }
};
