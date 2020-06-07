<?php namespace Cc\Areas\Models;

use Model;

/**
 * Model
 */
class ServiceAreasModel extends Model
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
    public $table = 'cc_areas_servicearea';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // public $hasMany = [
    //     'areas' => [
    //         'Cc\Areas\Models\AreasModel',
    //         'table' => 'cc_areas_',
    //         'key' => 'id'
    //     ],
    //     'services' => [
    //         'Cc\Services\Models\Services',
    //         'table' => 'cc_areas_servicearea',
    //         'key' => 'id'
    //     ],
    // ];
}
