<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->decimal('total', 10, 2)->nullable();
        });
    }
};
