<?php namespace Cc\Authors\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAuthors extends Migration
{
    public function up()
    {
        Schema::table('cc_authors_', function($table)
        {
            $table->string('avatar', 500)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_authors_', function($table)
        {
            $table->dropColumn('avatar');
        });
    }
}
