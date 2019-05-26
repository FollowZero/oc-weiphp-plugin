<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePlusWeiphpMaterialText extends Migration
{
    public function up()
    {
        Schema::create('plus_weiphp_material_text', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('content');
            $table->integer('is_use')->default(1);
            $table->integer('aim_id');
            $table->string('aim_table', 255);
            $table->integer('pub_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('plus_weiphp_material_text');
    }
}
