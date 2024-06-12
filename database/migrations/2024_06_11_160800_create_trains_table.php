<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * CREATE TABLE trains (
    id INT AUTO_INCREMENT PRIMARY KEY,
    azienda VARCHAR(255) NOT NULL,
    stazione_partenza VARCHAR(255) NOT NULL,
    stazione_arrivo VARCHAR(255) NOT NULL,
    codice_treno SMALLINT UNSIGNED NOT NULL,
    orario_arrivo DATETIME NOT NULL,
    orario_partenza DATETIME NOT NULL,
    in_orario BOOLEAN NOT NULL,
    cancellato BOOLEAN NOT NULL
);
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('azienda');
            $table->string('stazione_partenza');
            $table->string('stazione_arrivo');
            $table->unsignedSmallInteger('codice_treno');
            $table->datetime('orario_arrivo');
            $table->datetime('orario_partenza');
            $table->boolean('in_orario');
            $table->boolean('cancellato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
