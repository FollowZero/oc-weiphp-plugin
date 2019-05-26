<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePlusWeiphpMaterialImage extends Migration
{
    public function up()
    {
        Schema::create('plus_weiphp_material_image', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('media_id', 100)->nullable()->default('0');
            $table->string('wechat_url', 255)->nullable();
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
        Schema::dropIfExists('plus_weiphp_material_image');
    }
}
