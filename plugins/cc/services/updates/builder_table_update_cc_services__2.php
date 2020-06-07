<?php namespace Cc\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCcServices2 extends Migration
{
    public function up()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->string('media', 1000)->nullable();
            $table->renameColumn('image', 'featured_image');
        });
    }
    
    public function down()
    {
        Schema::table('cc_services_', function($table)
        {
            $table->dropColumn('media');
            $table->renameColumn('featured_image', 'image');
        });
    }
}
