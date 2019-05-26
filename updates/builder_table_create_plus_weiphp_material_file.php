<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePlusWeiphpMaterialFile extends Migration
{
    public function up()
    {
        Schema::create('plus_weiphp_material_file', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('file_id')->nullable();
            $table->string('cover_url', 255)->nullable();
            $table->string('media_id', 100)->nullable()->default('0');
            $table->string('wechat_url', 255)->nullable();
            $table->string('title', 100)->nullable();
            $table->integer('type')->nullable();
            $table->text('introduction')->nullable();
            $table->integer('is_use')->nullable()->default(1);
            $table->integer('aim_id');
            $table->string('aim_table', 255);
            $table->integer('pub_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('plus_weiphp_material_file');
    }
}
