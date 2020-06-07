<?php namespace Cc\Testimonials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcTestimonials extends Migration
{
    public function up()
    {
        Schema::create('cc_testimonials_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('source', 255)->nullable();
            $table->string('type', 255);
            $table->string('country', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->smallInteger('review')->nullable();
            $table->string('source_url', 500)->nullable();
            $table->text('content')->nullable();
            $table->string('video', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_testimonials_');
    }
}
