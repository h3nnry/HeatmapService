<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LinkType
 * @package App
 */
class LinkType extends Model
{

    /**
     * @var string
     */
    protected $table = 'link_types';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are block to mass assign.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];

    /**
     * Get the logs for the type.
     */
    public function logs()
    {
        return $this->hasMany('App\Log');
    }
}
