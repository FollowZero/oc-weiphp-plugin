<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePlusWeiphpAutoReply extends Migration
{
    public function up()
    {
        Schema::table('plus_weiphp_auto_reply', function($table)
        {
            $table->integer('text_id')->nullable();
            $table->integer('img_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('plus_weiphp_auto_reply', function($table)
        {
            $table->dropColumn('text_id');
            $table->dropColumn('img_id');
        });
    }
}
