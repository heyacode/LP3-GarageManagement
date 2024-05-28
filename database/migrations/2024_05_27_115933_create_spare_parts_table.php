<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    public function up():void
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('partName');
            $table->string('partReference')->unique();
            $table->string('supplier');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('spareparts');
    }
}
