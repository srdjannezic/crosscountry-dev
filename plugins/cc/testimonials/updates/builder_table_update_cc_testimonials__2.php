<?php namespace Cc\Testimonials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcTestimonials2 extends Migration
{
    public function up()
    {
        Schema::table('cc_testimonials_', function($table)
        {
            $table->text('title')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_testimonials_', function($table)
        {
            $table->dropColumn('title');
        });
    }
}
