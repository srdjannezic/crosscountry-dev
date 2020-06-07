<?php namespace Cc\Blocks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcBlocksRegion extends Migration
{
    public function up()
    {
        Schema::create('cc_blocks_region', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_blocks_region');
    }
}
