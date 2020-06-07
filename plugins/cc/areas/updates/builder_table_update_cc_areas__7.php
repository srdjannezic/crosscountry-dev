<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas7 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->text('special_title')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('special_title');
        });
    }
}
