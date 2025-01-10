<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->date('start_date')->nullable();
            $table->date('exipre_date')->nullable();
            $table->text('notes')->nullable();
            $table->enum('discound_type',['fixied','precent']);
            $table->float('discount');
            $table->enum('status',['start','finsh','darft','not_begin']);
            $table->unique('product_id');
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
        Schema::dropIfExists('discounts');
    }
};
