<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zone
 *
 * @property $id_zone
 * @property $name
 * @property $location
 * @property $capacity
 * @property $type
 * @property $weather
 * @property $created_at
 * @property $updated_at
 *
 * @property Animal[] $animals
 * @property Animal[] $animals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zone extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'zones';
    protected $primaryKey = 'id_zone';
    public $incrementing = true;
    public $keyType = 'int';
    protected $fillable = ['id_zone', 'name', 'location', 'capacity', 'type', 'weather'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animals()
    {
        return $this->hasMany(\App\Models\Animal::class, 'id_zone', 'fk_zone');
    }
    
}
