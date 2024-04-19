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
        Schema::create('pkl_places', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('telephone');
            $table->string('open_time');
            $table->string('link_gmaps');
            $table->string('image_url');
            $table->decimal('rating', 2, 2)->default(0);
            $table->integer('daya_tampung')->default(0);
            $table->integer('akses_jalan')->default(0);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkl_places');
    }
};
