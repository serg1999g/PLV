<?php

namespace App\Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Properties:
 * @property int                                                    $id
 * @property string                                                 $title
 * @property string                                                 $description
 * @property string                                                 $content
 * @property \Carbon\Carbon                                         $created_at
 * @property \Carbon\Carbon                                         $updated_at
 */

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function query()
    {
        return parent::query();
    }
}
