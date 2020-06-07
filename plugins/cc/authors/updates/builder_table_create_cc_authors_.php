<?php namespace Cc\Authors\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcAuthors extends Migration
{
    public function up()
    {
        Schema::create('cc_authors_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('type', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_authors_');
    }
}
