<?php namespace Cc\Areas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcAreas6 extends Migration
{
    public function up()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_image')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('cc_areas_', function($table)
        {
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_description');
            $table->dropColumn('seo_image');
        });
    }
}
