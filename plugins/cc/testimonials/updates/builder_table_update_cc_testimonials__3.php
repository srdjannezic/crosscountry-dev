<?php namespace Cc\Testimonials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcTestimonials3 extends Migration
{
    public function up()
    {
        Schema::table('cc_testimonials_', function($table)
        {
            $table->renameColumn('country', 'location');
        });
    }
    
    public function down()
    {
        Schema::table('cc_testimonials_', function($table)
        {
            $table->renameColumn('location', 'country');
        });
    }
}
