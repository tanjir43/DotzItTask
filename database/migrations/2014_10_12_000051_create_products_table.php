<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf16_general_ci');
            //$table->string('name_l')->nullable()->collation('utf16_general_ci');
            /* $table->string('slug')->nullable()->unique();
            $table->string('description')->collation('utf16_general_ci');
            $table->float('stock_qty',12,4)->nullable()->default(0);
            $table->float('alert_qty',12,4)->nullable()->default(0);
            $table->integer('min_order')->nullable()->default(0);
            $table->integer('sku')->nullable()->unique(); */
            $table->float('price',12,4)->nullable();
            // $table->float('selling_price',12,4)->nullable();

            // $table->foreignId('category_id')->constrained('categories');
            // $table->foreignId('brand_id')->constrained('brands');
            // $table->foreignId('color_id')->constrained('colors');
            // $table->foreignId('prodact_model_id')->constrained('product_models');
            // $table->foreignId('tag_id')->constrained('tags');
            // $table->foreignId('size_id')->constrained('sizes');

            $table->foreignId('media_id')->nullable()->constrained('media');
            $table->string('image');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            #$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
