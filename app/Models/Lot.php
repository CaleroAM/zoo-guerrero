<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lot
 *
 * @property $id_lot
 * @property $date_cad
 * @property $portion
 * @property $date_start
 * @property $fk_food
 * @property $created_at
 * @property $updated_at
 *
 * @property Food $food
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lot extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_lot', 'date_cad', 'portion', 'date_start', 'fk_food'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food()
    {
        return $this->belongsTo(\App\Models\Food::class, 'fk_food', 'id_food');
    }
    
}
