<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices11 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->renameColumn('3box_title', 'three_box_title');
            $table->renameColumn('3box', 'three_box');
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->renameColumn('three_box_title', '3box_title');
            $table->renameColumn('three_box', '3box');
        });
    }
}
