<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Animal
 *
 * @property $id_animal
 * @property $name
 * @property $age
 * @property $height
 * @property $weigh
 * @property $sex
 * @property $fecha_nac
 * @property $descripcion
 * @property $fk_specie
 * @property $fk_zone
 * @property $created_at
 * @property $updated_at
 *
 * @property Species $species
 * @property Zone $zone
 * @property Careful[] $carefuls
 * @property Careful[] $carefuls
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Animal extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_animal', 'name', 'age', 'height', 'weigh', 'sex', 'fecha_nac', 'descripcion', 'fk_specie', 'fk_zone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function species()
    {
        return $this->belongsTo(\App\Models\Species::class, 'fk_specie', 'id_specie');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone()
    {
        return $this->belongsTo(\App\Models\Zone::class, 'fk_zone', 'id_zone');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carefuls()
    {
        return $this->hasMany(\App\Models\Careful::class, 'id_animal', 'fk_animal');
    }
    
    
}
