<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up():void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('repairId')->constrained('repairs')->onDelete('cascade');
            $table->decimal('additionalCharges', 8, 2)->nullable();
            $table->decimal('totalAmount', 8, 2);
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('invoices');
    }
}
