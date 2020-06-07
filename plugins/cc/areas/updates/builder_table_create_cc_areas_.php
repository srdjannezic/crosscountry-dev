<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcAreas extends Migration
{
    public function up()
    {
        Schema::create('cc_areas_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('name');
            $table->text('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->text('content')->nullable();
            $table->text('about')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_areas_');
    }
}
