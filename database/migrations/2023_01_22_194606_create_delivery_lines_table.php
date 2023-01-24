<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('delivery_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->string('item');
            $table->decimal('price', 14, 2);
            $table->decimal('qty', 16, 8);
            $table->foreign('delivery_id')
                ->references('id')
                ->on('deliveries');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_lines');
    }
};
