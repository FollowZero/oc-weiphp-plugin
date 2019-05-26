<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePlusWeiphpMaterialNews2 extends Migration
{
    public function up()
    {
        Schema::table('plus_weiphp_material_news', function($table)
        {
            $table->text('child')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('plus_weiphp_material_news', function($table)
        {
            $table->dropColumn('child');
        });
    }
}
