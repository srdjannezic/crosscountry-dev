<?php namespace Cc\Ccsupport\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcCcsupport extends Migration
{
    public function up()
    {
        Schema::table('cc_ccsupport_', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_ccsupport_', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
