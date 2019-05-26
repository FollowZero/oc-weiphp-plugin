<?php namespace Plus\Weiphp\Models;

use Model;

/**
 * Model
 */
class MaterialNews extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'plus_weiphp_material_news';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachOne=[
        'cover'=>'System\Models\File',
        'cover_cd'=>'System\Models\File',
    ];
    protected $jsonable=['child'];
//    public $hasMany = [
//        'child' => ['Plus\Weiphp\Models\MaterialNews', 'key' => 'group_id', 'otherKey' => 'id']
//    ];
}
