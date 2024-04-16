<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('numberGame', function (Blueprint $table) {
            $table->id();
            $table->string('round_id')->unique();   
            $table->string('winner')->unique();            
            // Define columns for numbers 1 to 9
            for ($i = 1; $i <= 9; $i++) {
                $columnName = 'number' . $i;
                $table->unsignedInteger($columnName)->default(0)->nullable()->unsigned()->comment('The value stored');
            }
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('number_game');
    }
};