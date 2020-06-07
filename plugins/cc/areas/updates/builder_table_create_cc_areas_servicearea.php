<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcAreasServicearea extends Migration
{
    public function up()
    {
        Schema::create('cc_areas_servicearea', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('service_id');
            $table->integer('area_id');
            $table->primary(['service_id','area_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_areas_servicearea');
    }
}
