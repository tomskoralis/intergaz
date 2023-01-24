<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('address_id');
            $table->integer('type');
            $table->integer('status')
                ->default(1);
            $table->foreign('route_id')
                ->references('id')
                ->on('routes');
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
