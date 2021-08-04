<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->string('short_description');
            $table->decimal('price',14,2);
            $table->decimal('old_price',14,2)->nullable();
            $table->text('description')->nullable();
            $table->text('meta')->nullable();
            $table->integer('type'); // 1 : smartphone, 2 : mobile service, 3 : energy service
            $table->text('affiliate_link')->nullable();
            $table->foreignId('brand_id')->nullable()
                ->references('id')
                ->on('brands')->onDelete('cascade')->onUpdate('cascade');
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
}
