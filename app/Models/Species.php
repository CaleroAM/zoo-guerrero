<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Species
 *
 * @property $id_specie
 * @property $name_scientific
 * @property $name_common
 * @property $family
 * @property $created_at
 * @property $updated_at
 *
 * @property Animal[] $animals
 * @property Animal[] $animals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Species extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_specie', 'name_scientific', 'name_common', 'family'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animals()
    {
        return $this->hasMany(\App\Models\Animal::class, 'id_specie', 'fk_specie');
    }
    
}
