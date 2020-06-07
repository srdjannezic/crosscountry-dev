<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas5 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->string('services_title', 255)->nullable();
            $table->text('services_subtitle')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('services_title');
            $table->dropColumn('services_subtitle');
        });
    }
}
