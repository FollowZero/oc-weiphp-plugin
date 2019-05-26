<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePlusWeiphpMaterialNews extends Migration
{
    public function up()
    {
        Schema::rename('plus_weiphp_news', 'plus_weiphp_material_news');
    }
    
    public function down()
    {
        Schema::rename('plus_weiphp_material_news', 'plus_weiphp_news');
    }
}
