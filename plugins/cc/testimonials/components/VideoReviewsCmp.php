<?php namespace Cc\Testimonials\Components;

use Event;
use BackendAuth;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cc\Testimonials\Models\TestimonialsModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VideoReviewsCmp extends ComponentBase
{
    /**
     * @var BlogPost The post model used for display.
     */
    public $videos;

    public function componentDetails()
    {
        return [
            'name'        => 'VideoReviews',
        ];
    }


    public function onRun()
    {
        $reviews = TestimonialsModel::where('type','video')->paginate(3,1);
        $this->page['reviews'] = $this->videos = $reviews;
        
        if($this->property('featured') != 'yes'){
            $this->page['last'] = $this->videos->lastPage();
        }
    } 

    public function onFilterVideos(){
        //var_dump($_POST['page']);
        $videos = TestimonialsModel::where('type','video')->paginate(3,$_POST['page']);
        
        $this->page['reviews'] = $this->videos = $videos;     
        return array('last'=>$this->videos->lastPage());
    }
 
}
