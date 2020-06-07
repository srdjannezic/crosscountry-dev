<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->string('type', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
