<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_ko');
            $table->string('name_en')->nullable();
            $table->string('category', 50)->default('block')->index();
            $table->float('grade_mpa')->nullable()->comment('MPa strength or flexural grade');
            $table->integer('block_width')->nullable()->comment('Width in mm');
            $table->integer('block_height')->nullable()->comment('Height in mm');
            $table->integer('block_length')->nullable()->comment('Length in mm');
            $table->float('weight_kg')->nullable()->comment('Weight in kg');
            $table->string('coverage_per_m2')->nullable()->comment('Units per m2 e.g. 10 ea/m2');
            $table->string('g2b_code')->nullable()->comment('Public procurement identifier');
            $table->string('slump')->nullable()->comment('Slump value e.g. 150mm');
            $table->string('max_aggregate_size')->nullable()->comment('Max aggregate size e.g. 25mm');
            $table->text('application_ko')->nullable();
            $table->text('application_en')->nullable();
            $table->text('features_ko')->nullable();
            $table->text('features_en')->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('sort_order')->default(0);
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
