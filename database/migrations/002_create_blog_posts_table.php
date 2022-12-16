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
        Schema::create('blog_posts', function(Blueprint $table) {
            $table->id();
            $table->morphs('author');
            $table->foreignId('featured_media_id')->nullable()->constrained('media');

            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->text('introduction')->nullable();
            $table->longText('description')->nullable();

            $table->dateTime('published_at')->nullable();

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
        Schema::drop('blog_posts');
    }
};
