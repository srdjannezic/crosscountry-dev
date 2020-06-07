<?php namespace Cc\Testimonials\Models;

use Model;

/**
 * Model
 */
class TestimonialsModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'cc_testimonials_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [ 
        'area' => [
            'Cc\Areas\Models\AreasModel',
            'table' => 'cc_testimonials_areas',
            'key' => 'area_id',
            'otherKey' => 'testimonial_id',
        ]
    ];
}
