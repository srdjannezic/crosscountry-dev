<?php namespace Cc\Testimonials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCcTestimonialsAreas extends Migration
{
    public function up()
    {
        Schema::create('cc_testimonials_areas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('area_id')->nullable();
            $table->integer('testimonial_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cc_testimonials_areas');
    }
}
