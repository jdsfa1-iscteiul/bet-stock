<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_registers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();	
            $table->foreignId('stock_id')->constrained('stocks');
            $table->double('open', 8, 2);
            $table->double('high', 8, 2);
            $table->double('low', 8, 2);
            $table->double('current', 8, 2);
            $table->double('previous_close', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_registers');
    }
}
