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
        Schema::create('restorans', function (Blueprint $table) {
            $table->id();
            $table->string('tittle')->default('Default Title');
            $table-> string('description');
            $table -> integer ('like')->default(0);
            $table -> string ('file_video');
            $table -> string ('file_poster');
            $table -> integer ('dislike')->default(0);
            $table -> string ('status')->default('none');
            $table -> string ('category');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restorans');
    }
};
