<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas4 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
