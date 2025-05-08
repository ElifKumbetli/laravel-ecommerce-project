<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id("product_id");
            $table->foreignIdFor(Category::class, "category_id");
            $table->string("name");
            $table->float("price");
            $table->float("old_price")->nullable();
            $table->text("lead")->nullable();
            $table->text("description")->nullable();
            $table->string("slug");
            $table->boolean("is_active");
            $table->softDeletes();
            $table->timestamps();
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
