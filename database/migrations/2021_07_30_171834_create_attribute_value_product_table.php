<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValueProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_value_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('attribute_value_id')->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('attribute_id')->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('attribute_values');
    }
}
