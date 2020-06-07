<?php namespace Cc\Testimonials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcTestimonials6 extends Migration
{
    public function up()
    {
        Schema::table('cc_testimonials_', function($table)
        {
            $table->smallInteger('is_review')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_testimonials_', function($table)
        {
            $table->dropColumn('is_review');
        });
    }
}
