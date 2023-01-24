<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('car_number');
            $table->integer('status')
                ->default(1);
            $table->string('driver_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
