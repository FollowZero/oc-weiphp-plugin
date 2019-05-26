<?php namespace Plus\Weiphp\Models;

use Model;

/**
 * Model
 */
class AutoReply extends Model
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
    public $table = 'plus_weiphp_auto_reply';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $hasOne = [
        'material_text' => ['Plus\Weiphp\Models\MaterialText', 'key' => 'id', 'otherKey' => 'text_id'],
        'material_img' => ['Plus\Weiphp\Models\MaterialImage', 'key' => 'id', 'otherKey' => 'img_id'],
        'material_news' => ['Plus\Weiphp\Models\MaterialNews', 'key' => 'id', 'otherKey' => 'news_id'],
        'material_voice' => ['Plus\Weiphp\Models\MaterialFile', 'key' => 'id', 'otherKey' => 'voice_id'],
        'material_video' => ['Plus\Weiphp\Models\MaterialFile', 'key' => 'id', 'otherKey' => 'video_id'],
    ];



}
