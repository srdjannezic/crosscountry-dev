<?php namespace Cc\Blocks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcBlocks extends Migration
{
    public function up()
    {
        Schema::create('cc_blocks_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('type', 255)->nullable();
            $table->text('content')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_blocks_');
    }
}
