<?php namespace Cc\Blocks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcBlocks2 extends Migration
{
    public function up()
    {
        Schema::table('cc_blocks_', function($table)
        {
            $table->renameColumn('region', 'page');
        });
    }
    
    public function down()
    {
        Schema::table('cc_blocks_', function($table)
        {
            $table->renameColumn('page', 'region');
        });
    }
}
