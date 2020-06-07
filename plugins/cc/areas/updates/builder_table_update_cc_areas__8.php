<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas8 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->text('desktop_image')->nullable();
            $table->text('mobile_image')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('desktop_image');
            $table->dropColumn('mobile_image');
        });
    }
}
