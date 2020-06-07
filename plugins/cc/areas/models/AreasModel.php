<?php namespace Cc\Areas\Models;

use Model;
use Illuminate\Support\Str;
use Html;
/**
 * Model
 */
class AreasModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $jsonable = ['content','about'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'cc_areas_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // public $belongsTo = [
    //     'areas' => [
    //         'Cc\Areas\Models\AreasModel',
    //         'table' => 'cc_areas_',
    //         'key' => 'parent_id',
    //         'otherKey' => 'id',
    //         'order' => 'name'
    //     ]
    // ];

    // public $belongsTo = [
    //     'areas' => [
    //         'Cc\Areas\Models\AreasModel',
    //         'table' => 'cc_areas_',
    //         'key' => 'parent_id',
    //         //'otherKey' => 'id',
    //         'order' => 'name'
    //     ],
    // ];

    public $belongsTo = [
        'areas' => [
            'Cc\Areas\Models\AreasModel',
            'table' => 'cc_areas_',
            'key' => 'parent_id',
            //'otherKey' => 'id',
            'order' => 'name'
        ],
    ];

    public $belongsToMany = [
        'services' => [
            'Cc\Services\Models\Services',
            'table' => 'cc_areas_servicearea',
            'key' => 'area_id',
            'otherKey' => 'service_id',
        ],
        'testimonials' => [
            'Cc\Testimonials\Models\TestimonialsModel',
            'table' => 'cc_testimonials_areas',
            'key' => 'testimonial_id',
            'otherKey' => 'area_id',
        ]
    ];

    public function beforeSave()
    {
        //$this->name = Html::strip($this->name);
        $this->slug = Str::slug($this->name);
    }

}
