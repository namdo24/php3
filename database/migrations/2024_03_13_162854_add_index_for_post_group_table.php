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
        Schema::table('posts', function (Blueprint $table) {
         
            $table->index('category_id' );
            $table->index('author_id');
            $table->string('title',100)->change();
           
        });
        Schema::table('post_tag', function (Blueprint $table) {
            $table->primary(['post_id','tag_id']);
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
    }
};
