<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcServices extends Migration
{
    public function up()
    {
        Schema::create('cc_services_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('name', 255);
            $table->text('content')->nullable();
            $table->string('image', 1000)->nullable();
            $table->string('slug', 255)->nullable();
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_services_');
    }
}
