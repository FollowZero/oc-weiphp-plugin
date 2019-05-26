<?php namespace Plus\Weiphp\Models;

use Model;

/**
 * Model
 */
class MaterialFile extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'plus_weiphp_material_file';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachOne=[
        'file'=>'System\Models\File'
    ];
}
