<?php namespace Cc\Services\Models;

use Model;
use Str;
use Html;

/**
 * Model
 */
class Services extends Model
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
    public $table = 'cc_services_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = ['questions','three_box'];

    public function beforeSave()
    {
        $this->name = Html::strip($this->name);
        $this->slug = Str::slug($this->name);
    }

    public $belongsToMany = [
        'areas' => [
            'Cc\Areas\Models\AreasModel',
            'table' => 'cc_areas_servicearea', 
            'key' => 'service_id',
            'otherKey' => 'area_id'
        ],
    ];

}
