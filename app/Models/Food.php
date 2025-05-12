<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Food
 *
 * @property $id_food
 * @property $name
 * @property $content
 * @property $total_amount
 * @property $cost
 * @property $fk_supplier
 * @property $created_at
 * @property $updated_at
 *
 * @property Supplier $supplier
 * @property Careful[] $carefuls
 * @property Lot[] $lots
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Food extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'foods';
    protected $primaryKey ='id_food';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['id_food', 'name', 'content', 'total_amount', 'cost', 'fk_supplier'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'fk_supplier', 'rfc');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carefuls()
    {
        return $this->hasMany(\App\Models\Careful::class, 'id_food', 'fk_food');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lots()
    {
        return $this->hasMany(\App\Models\Lot::class, 'id_food', 'fk_food');
    }
    
}
