<?php namespace PeterHegman\SlickSlider\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeterhegmanSlicksliderSlideShows12 extends Migration
{
    public function up()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->text('mobile_image')->nullable();
            $table->dropColumn('is_mobile');
        });
    }
    
    public function down()
    {
        Schema::table('peterhegman_slickslider_slide_shows', function($table)
        {
            $table->dropColumn('mobile_image');
            $table->smallInteger('is_mobile')->nullable();
        });
    }
}
