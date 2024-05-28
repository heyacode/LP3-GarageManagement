<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    public function up():void
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('mecanicNotes')->nullable();
            $table->text('clientNotes')->nullable();
            $table->foreignId('mecanicId')->constrained('users')->onDelete('cascade');
            $table->foreignId('vehicleId')->constrained('vehicles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('repairs');
    }
}
