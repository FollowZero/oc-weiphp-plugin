<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePlusWeiphpAutoReply extends Migration
{
    public function up()
    {
        Schema::create('plus_weiphp_auto_reply', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('msg_type', 50)->nullable()->default('text');
            $table->string('keyword', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('plus_weiphp_auto_reply');
    }
}
