<?php namespace Wollson\SeoGeneral\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWollsonSeogeneral extends Migration
{
    public function up()
    {
        if(!Schema::hasTable('wollson_seogeneral_')){
            Schema::create('wollson_seogeneral_', function($table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id');
                $table->text('page_title')->nullable();
                $table->text('meta_title')->nullable();
                $table->text('meta_desc')->nullable();
                $table->text('og_image')->nullable();
            });
        }
    }
    
    public function down()
    {
        Schema::dropIfExists('wollson_seogeneral_');
    }
}
