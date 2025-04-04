<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->text('lokasi')->nullable();
            $table->enum('status', ['hadir', 'terlambat', 'izin', 'cuti', 'alpha'])->default('hadir');
            $table->timestamps();
        });

        Schema::create('izin_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('jenis', ['izin', 'cuti']);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('alasan');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->text('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('izin_cuti');
        Schema::dropIfExists('absensi');
    }
};
