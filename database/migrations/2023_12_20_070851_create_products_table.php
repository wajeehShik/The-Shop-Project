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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->idnex();
            $table->string('slug')->unique();
            $table->string("image");
            $table->text('content');
            $table->string('description');
            $table->double('price');
            $table->double('quantity');
            $table->enum("status",['0','1'])->default('1');
            $table->foreignId('admin_id')->nullable()->constrained('admins', 'id')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands', 'id')->nullOnDelete();
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
        Schema::dropIfExists('products');
    }
};
