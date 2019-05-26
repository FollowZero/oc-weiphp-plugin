<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePlusWeiphpMaterialText extends Migration
{
    public function up()
    {
        Schema::table('plus_weiphp_material_text', function($table)
        {
            $table->text('content')->nullable()->change();
            $table->integer('is_use')->nullable()->change();
            $table->integer('aim_id')->nullable()->change();
            $table->string('aim_table', 255)->nullable()->change();
            $table->integer('pub_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('plus_weiphp_material_text', function($table)
        {
            $table->text('content')->nullable(false)->change();
            $table->integer('is_use')->nullable(false)->change();
            $table->integer('aim_id')->nullable(false)->change();
            $table->string('aim_table', 255)->nullable(false)->change();
            $table->integer('pub_id')->nullable(false)->change();
        });
    }
}
