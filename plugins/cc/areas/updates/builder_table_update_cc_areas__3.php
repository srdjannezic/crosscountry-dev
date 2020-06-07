<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas3 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->string('area', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('area');
        });
    }
}
