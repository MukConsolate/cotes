<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->string('cours');
            $table->float('note');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cotes');
    }
};

/* use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /* public function up(): void
    {
        Schema::create('cotes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
 */
    /**
     * Reverse the migrations.
     */
   /*  public function down(): void
    {
        Schema::dropIfExists('cotes');
    }
};  */
