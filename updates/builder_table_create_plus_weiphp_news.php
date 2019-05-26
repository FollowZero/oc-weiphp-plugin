<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePlusWeiphpNews extends Migration
{
    public function up()
    {
        Schema::create('plus_weiphp_news', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 100)->nullable();
            $table->string('author', 30)->nullable();
            $table->string('intro', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('link', 255)->nullable();
            $table->integer('group_id')->nullable()->default(0);
            $table->string('thumb_media_id', 100)->nullable();
            $table->string('media_id', 100)->nullable()->default('0');
            $table->string('url', 255)->nullable();
            $table->integer('is_use')->nullable()->default(1);
            $table->integer('aim_id')->nullable();
            $table->string('aim_table', 255)->nullable();
            $table->integer('pub_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('plus_weiphp_news');
    }
}
