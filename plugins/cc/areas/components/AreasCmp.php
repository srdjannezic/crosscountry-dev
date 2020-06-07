<?php namespace Cc\Areas\Components;

use BackendAuth;
use Db;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Areas\Models\AreasModel as Areas;
use Cc\Testimonials\Models\TestimonialsModel;

class AreasCmp extends ComponentBase
{
    /**
     * @var Collection A collection of categories to display
     */
    public $areas;

    public function componentDetails()
    {
        return [
            'name'        => 'areas',
        ];
    }

    public function onRun()
    {
        
        //Areas::where('type','City')->orderBy('parent_id')->get();


        $this->loadCities();

        $this->page['state'] = 'load';
    }

    private function loadCities(){
        $areas = Areas::where('type','Area')->get();
        $cities = [];


        foreach ($areas as $area) {
            $countries = Areas::where('type','Country')->where('parent_id',$area->id)->get();

            foreach ($countries as $country) {
                $city = Areas::where('type','City')->where('parent_id',$country->id)->get();
                
                foreach ($city as $c) {
                    $cities[] = $c;
                }
            }
        }
        //var_dump($cities);
        $this->areas = $cities;

        $this->page['areas'] = $this->areas;
        return  $this->areas;       
    }

    public function getCitiesFromArea($parent){
        $cities = Areas::where('parent_id',$parent)->where('type','!=','Area')->orderBy('parent_id')->get();
        return $cities;
    }

    public function getCityParent($parent){
        $parent = Areas::where('id',$parent)->first();
        return $parent;
    }

    public function onSearchArea(){
        $name = $_POST['name']; 
        $selected_area = $_POST['selected_area'];

        //var_dump($selected_area);

        $msg = '';

        if($name == '') $this->loadCities();
        else {
            //$country = Areas::where('parent_id',$area['id'])->first();
            $search = Areas::where('name','like','%'.$name.'%')->get();
            //var_dump($selected_area);

            if($selected_area != ''){
                $search = DB::select('SELECT search.* FROM cc_areas_ as search
                                    JOIN cc_areas_ AS country
                                    ON country.id = search.parent_id
                                    JOIN cc_areas_ AS area
                                    ON area.id = country.parent_id
                                    WHERE search.name LIKE "%los%" AND area.name = "'.$selected_area.'"');
                
            }

            //$country = Areas::where('id',$search['parent_id'])->first();

           //$area = Areas::where('id',$country['id'])->first();


            //echo $area['name'] . ' ' . $selected_area;
            //var_dump($area);
            //var_dump($area2);

            $count = count($search);
            if($count == 0){
                $msg = "There is no result for search term.";
            }            
            $this->page['areas'] = $search;
            $this->page['msg'] = $msg;
        }
        $this->page['state'] = 'search';
    }

    public function onSelectArea(){
        $name = $_POST['name']; 


        $areas = new Areas;
        $msg = '';

        if($name == '') $this->loadCities();
        else {
            $area = $areas->where('name',$name)->first();

            $countries = $areas->where('parent_id',$area['id'])->get();

            
            
            //var_dump($countries);
            foreach ($countries as $country) {
                //var_dump($country['id']);
                $areas = $areas->orWhere('parent_id',$country['id']);
            }
            $getresult = $areas->get();
            $count = count($getresult);
            if($count == 0){
                $msg = "There is no result for search term.";
            }  

            $this->page['areas'] = $getresult;
            $this->page['msg'] = $msg;
        }
        
        $this->page['state'] = 'area';
    }

    public function onSelectCountry(){
        $name = $_POST['name']; 
        $msg = '';
        if($name == '') $this->loadCities();
        else {
            $country = Areas::where('name',$name)->first();
            $getresult = Areas::where('parent_id',$country['id'])->get();
            $count = count($getresult);
            if($count == 0){
                $msg = "There is no result for search term.";
            }  
            $this->page['areas'] = $getresult;
            $this->page['msg'] = $msg;
        }
        $this->page['state'] = 'country';
    }

    public function listCountries(){
        $ctr = Areas::where('type','Country')->get();
        return $ctr;
    }
}
