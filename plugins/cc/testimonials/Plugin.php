<?php namespace Cc\Testimonials;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return [
    		'Cc\Testimonials\Components\TestimonialsCmp' => 'Testimonials',
    		'Cc\Testimonials\Components\VideoReviewsCmp' => 'VideoReviews'];
    }

    public function registerSettings()
    {
    }
}
