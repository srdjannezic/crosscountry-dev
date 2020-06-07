<?php namespace Cc\Ccsupport\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcCcsupport extends Migration
{
    public function up()
    {
        Schema::create('cc_ccsupport_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('phone', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_ccsupport_');
    }
}
