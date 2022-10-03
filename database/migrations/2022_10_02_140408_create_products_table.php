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
            $table->foreignId('species_id')->constrained('species');
            $table->foreignId('drying_method_id')->constrained('drying_methods');
            $table->foreignId('treatment_id')->nullable()->constrained('treatments');
            $table->foreignId('grade_option_id')->constrained('grade_options');
            $table->integer('thickness');
            $table->integer('width');
            $table->integer('length');
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
