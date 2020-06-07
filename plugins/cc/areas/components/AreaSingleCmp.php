<?php namespace Cc\Areas\Components;

use BackendAuth;
use Db;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Areas\Models\AreasModel as Areas;
use Cc\Testimonials\Models\TestimonialsModel;

class AreaSingleCmp extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $area;


    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'Slug',
                'type'        => 'string',
                'default'     => ':slug',
            ],
            'city' => [
                'title'       => 'City',
                'type'        => 'string',
                'default'     => ':city',
            ],
        ];
    }

    public function componentDetails()
    {
        return [
            'name'        => 'area',
        ];
    }

    public function onRun()
    {   
        $explode = explode('-cross-country-moving', $this->property('slug'));
        $slug = trim($explode[0]);
        if($this->property('city') ) { //city
            $slug = $this->property('city');
        }

        $this->page['area'] = $this->area = Areas::where('slug',$slug)->with('testimonials')->first();
        //var_dump($this->page['area']);
        //var_dump($this->area);
        if($this->area === NULL){
            return \Redirect::to('/404');
        }

    }

    public function getCitiesFromArea($parent){
        $cities = Areas::where('parent_id',$parent)->get();
        return $cities;
    }
}
