<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas2 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->integer('parent_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('parent_id');
        });
    }
}
