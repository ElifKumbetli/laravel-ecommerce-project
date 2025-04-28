<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // district: İlçe
    public function up(): void
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id("address_id");
            $table->foreignIdFor(User::class);
            $table->string("city");
            $table->string("district");
            $table->string("zipcode");
            $table->string("address");
            $table->boolean("is_default");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
