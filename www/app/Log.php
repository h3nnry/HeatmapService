<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Log
 * @package App
 */
class Log extends Model
{


    /**
     * @var string
     */
    protected $table = 'logs';

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
        'link', 'link_type_id', 'customer_id', 'created_at'
    ];

    /**
     * Get the link.
     */
    public function linkType()
    {
        return $this->belongsTo('App\LinkType');
    }

    /**
     * @param int $customerId
     * @return array
     */
    public static function getCustomersWithSameJourney(int $customerId)
    {
        return DB::select(DB::raw("
            SELECT 
                customer_id,
                GROUP_CONCAT(link
                    ORDER BY created_at ASC) AS link
            FROM
                logs
            WHERE
                customer_id <> {$customerId}
            GROUP BY customer_id
            HAVING link = (SELECT 
                    GROUP_CONCAT(link
                            ORDER BY created_at ASC)
                FROM
                    logs
                WHERE
                    customer_id = {$customerId})
        
        "));
    }
}
