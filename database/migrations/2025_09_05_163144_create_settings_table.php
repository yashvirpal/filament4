<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('account_holder')->nullable()->comment('Account Holder Name');
            $table->string('account_number')->nullable()->comment('Account Number');
            $table->string('bank')->nullable()->comment('Bank Name');
            $table->string('branch')->nullable()->comment('Branch Name');
            $table->string('neft_details')->nullable()->comment('NEFT / IFSC Code');
            $table->string('gpay')->nullable()->comment('Google Pay Number / UPI');
            $table->string('paytm')->nullable()->comment('Paytm Number / UPI');
            $table->string('helpline_number')->nullable()->comment('Customer Helpline Number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
