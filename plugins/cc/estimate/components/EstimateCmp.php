<?php namespace Cc\Estimate\Components;

use Event;
use BackendAuth;
use Cms\Classes\Page;
use Db;
use Cms\Classes\ComponentBase;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EstimateCmp extends ComponentBase
{
    /**
     * @var BlogPost The post model used for display.
     */
    public $estimate;

    public function componentDetails()
    {
        return [
            'name'        => 'EstimateForm',
        ];
    }


    public function onRun()
    {

    }
 
    public static function getCars(){
        $make = Db::table('make')->get();
        $newarray = [];

        foreach ($make as $m) {
            $models = Db::table('model')->where('make_id',$m->id)->get();
            
            
            $model = [];

            foreach ($models as $mod) {
                $model[] = array('model' => array('code' => $mod->code, 'title'=>$mod->title) );
            }

            $newarray[] = array('make' => array('code'=>$m->code,'title'=>$m->title, 'models' => $model) );

        }
        return $newarray;
    }
}
