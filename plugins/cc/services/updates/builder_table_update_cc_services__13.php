<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices13 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->text('three_box_subtitle')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->dropColumn('three_box_subtitle');
        });
    }
}
