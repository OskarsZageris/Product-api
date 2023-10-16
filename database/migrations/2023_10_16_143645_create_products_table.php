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
            $table->string('title')->nullable(false); // Title (required)
            $table->decimal('price', 10, 2)->nullable(false); // Price (required, decimal with 10 digits and 2 decimal places)
            $table->integer('stock')->nullable(false); // Amount in Stock (required)
            $table->text('description')->nullable(); // Description (optional)
            $table->string('supplier')->nullable(false); // Supplier (required)
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
