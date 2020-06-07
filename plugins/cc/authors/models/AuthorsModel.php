<?php namespace Cc\Authors\Models;

use Model;
use Illuminate\Support\Str;
use Html;

/**
 * Model
 */
class AuthorsModel extends Model
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
    public $table = 'cc_authors_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'posts' => ['RainLab\Blog\Models\Post',
            'table' => 'rainlab_blog_posts',
            'order' => 'published_at desc',
            'scope' => 'isPublished',
            'key'=>'author_id',
        ]
    ];

    public function beforeSave()
    {
        $this->slug = Str::slug($this->name);
    }
}
