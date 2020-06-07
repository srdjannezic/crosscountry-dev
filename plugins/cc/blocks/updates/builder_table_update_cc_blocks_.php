<?php namespace Cc\Blocks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcBlocks extends Migration
{
    public function up()
    {
        Schema::table('cc_blocks_', function($table)
        {
            $table->string('region', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_blocks_', function($table)
        {
            $table->dropColumn('region');
        });
    }
}
