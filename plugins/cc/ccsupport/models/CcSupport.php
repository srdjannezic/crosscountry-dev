<?php namespace Cc\Ccsupport\Models;

use Model;

/**
 * Model
 */
class CcSupport extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'cc_ccsupport_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
