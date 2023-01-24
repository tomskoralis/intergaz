<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
