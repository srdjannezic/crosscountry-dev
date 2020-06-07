<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices4 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->text('front_title')->nullable();
            $table->text('front_subtitle')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->dropColumn('front_title');
            $table->dropColumn('front_subtitle');
        });
    }
}
