<?php namespace Plus\Weiphp\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePlusWeiphpMaterialFile extends Migration
{
    public function up()
    {
        Schema::table('plus_weiphp_material_file', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('aim_id')->nullable()->change();
            $table->string('aim_table', 255)->nullable()->change();
            $table->integer('pub_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('plus_weiphp_material_file', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->integer('aim_id')->nullable(false)->change();
            $table->string('aim_table', 255)->nullable(false)->change();
            $table->integer('pub_id')->nullable(false)->change();
        });
    }
}
