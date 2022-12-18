<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function(Blueprint $table) {
            $table->id();
            $table->nullableMorphs('author');
            $table->foreignId('blog_post_id')->constrained();
            $table->foreignId('blog_comment_id')->nullable()->constrained();

            $table->string('author_name')->nullable();
            $table->string('content')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_comments');
    }
};
