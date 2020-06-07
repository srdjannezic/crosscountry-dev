<?php namespace Cc\Blocks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcBlocks3 extends Migration
{
    public function up()
    {
        Schema::table('cc_blocks_', function($table)
        {
            $table->text('back_img')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_blocks_', function($table)
        {
            $table->dropColumn('back_img');
        });
    }
}
