<?php namespace Cc\Testimonials\Components;

use Event;
use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Testimonials\Models\TestimonialsModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TestimonialsCmp extends ComponentBase
{
    /**
     * @var BlogPost The post model used for display.
     */
    public $testimonials;

    public function componentDetails()
    {
        return [
            'name'        => 'Testimonials',
        ];
    }

    public function defineProperties()
    {
        return [
            'type' => [
                'title'       => 'type',
                'default'     => '',
                'type'        => 'string',
            ],
            'featured' => [
                'title'       => 'featured',
                'default'     => '',
                'type'        => 'string',
            ],
        ];
    }


    public function onRun()
    {
        //var_dump($this->property('type'));
        if($this->property('featured') == 'yes'){
            $testimonials = TestimonialsModel::where('type',$this->property('type'))->where('featured',1)->get();
        }
        elseif($this->property('featured') == 'reviews'){
            $testimonials = TestimonialsModel::where('type',$this->property('type'))->where('is_review',1)->paginate(4,1);
        }
        else{
            $testimonials = TestimonialsModel::where('type',$this->property('type'))->paginate(4,1);
        }   
        $this->page['testimonials'] = $this->testimonials = $testimonials;
        if($this->property('featured') != 'yes' and $this->property('featured') != 'reviews'){
            $this->page['last'] = $this->testimonials->lastPage();
        }
    }

    public function onFilterReviews(){
        //var_dump($_POST['page']);
        $testimonials = TestimonialsModel::where('type',$this->property('type'))->paginate(4,$_POST['page']);
        
        $this->page['testimonials'] = $this->testimonials = $testimonials;     
        return array('last'=>$this->testimonials->lastPage());
    }
 
}
