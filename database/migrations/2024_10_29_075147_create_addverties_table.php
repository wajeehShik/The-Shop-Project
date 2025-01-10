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
        Schema::create('addverties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products', 'id')->nullOnDelete();
            $table->enum('type',['slider','navbar']);
            $table->foreignId('admin_id')->nullable()->constrained('admins', 'id')->nullOnDelete();

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
        Schema::dropIfExists('addverties');
    }
};
