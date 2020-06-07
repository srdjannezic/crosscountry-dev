<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices12 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->text('three_image')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->dropColumn('three_image');
        });
    }
}
