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
    public function up(): void
    {
        // NOTE DON'T CHANGE THE STRUCTURE
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedMediumInteger('id', true)->index();
            $table->string('name');
            $table->unsignedMediumInteger('state_id')->index();
            $table->string('state_code');
            $table->unsignedMediumInteger('country_id')->index();
            $table->char('country_code', 2);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->tinyInteger('flag')->default(1);
            $table->string('wikiDataId')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
