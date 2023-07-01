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
        Schema::create('cloture_caisses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("date");
            $table->string("time");
            $table->string("caissierE");
            $table->string("caissierS");
            $table->string("montant");
            $table->string("montantE");
            $table->string("glovoE");
            $table->string("glovoC");
            $table->string("cartebancaire");
            $table->string("LivE");
            $table->string("LivC");
            $table->string("encaissement");
            $table->string("signature");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloture_caisses');
    }
};
