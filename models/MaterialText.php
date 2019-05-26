<?php namespace Plus\Weiphp\Models;

use Model;

/**
 * Model
 */
class MaterialText extends Model
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
    public $table = 'plus_weiphp_material_text';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
