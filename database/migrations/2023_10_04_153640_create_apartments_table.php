<?php

use App\Models\Expense;
use App\Models\LivedIn;
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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->double('base_price');
            $table->double('security_deposit');
            $table->text('description');
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
