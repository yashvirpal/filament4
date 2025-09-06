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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->decimal('amount', 12, 2)->nullable(); 
            $table->date('draw_date')->nullable(); 
            $table->string('ticket_no')->nullable();
            $table->string('status_desc')->nullable();
            $table->tinyInteger('status')->nullable()->comment('0 = Payment Pending, 1 = Payment Transfer, 2 = Transaction Successful');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
