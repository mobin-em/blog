<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable()->after('content');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('image');
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['image', 'status']);
            $table->dropSoftDeletes();
        });
    }
};
