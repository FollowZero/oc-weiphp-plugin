<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePlusWeiphpAutoReply2 extends Migration
{
    public function up()
    {
        Schema::table('plus_weiphp_auto_reply', function($table)
        {
            $table->integer('video_id')->nullable();
            $table->integer('voice_id')->nullable();
            $table->integer('image_material')->nullable();
            $table->integer('news_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('plus_weiphp_auto_reply', function($table)
        {
            $table->dropColumn('video_id');
            $table->dropColumn('voice_id');
            $table->dropColumn('image_material');
            $table->dropColumn('news_id');
        });
    }
}
