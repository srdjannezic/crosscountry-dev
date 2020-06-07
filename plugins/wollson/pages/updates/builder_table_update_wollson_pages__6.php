<?php namespace Wollson\Pages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWollsonPages6 extends Migration
{
    public function up()
    {
        Schema::table('wollson_pages_', function($table)
        {
            $table->text('cover_video')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('wollson_pages_', function($table)
        {
            $table->dropColumn('cover_video');
        });
    }
}
