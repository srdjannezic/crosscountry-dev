<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices3 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
