<?php namespace Plus\Weiphp\Models;

use Model;

/**
 * Model
 */
class MaterialImage extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'plus_weiphp_material_image';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachOne=[
        'cover'=>'System\Models\File'
    ];
}
