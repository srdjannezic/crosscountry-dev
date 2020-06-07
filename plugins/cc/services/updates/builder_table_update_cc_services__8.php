<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices8 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->text('youtube')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->dropColumn('youtube');
        });
    }
}
