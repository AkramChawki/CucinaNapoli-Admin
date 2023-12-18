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
        Schema::create('chiffre_affaires', function (Blueprint $table) {
            $table->id();
            $table->string("restau");
            $table->float("montant");
            $table->float("montantE");
            $table->float("glovoE");
            $table->float("glovoC");
            $table->float("cartebancaire");
            $table->float("LivE");
            $table->float("LivC");
            $table->float("ComGlovo");
            $table->float("ComLivraison");
            $table->float("virement");
            $table->float("cheque");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chiffre_affaires');
    }
};
