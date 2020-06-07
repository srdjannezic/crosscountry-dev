<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices10 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->string('3box_title', 255)->nullable();
            $table->text('3box')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->dropColumn('3box_title');
            $table->dropColumn('3box');
        });
    }
}
