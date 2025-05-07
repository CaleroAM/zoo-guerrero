<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shift
 *
 * @property $id_shift
 * @property $description
 * @property $hour_s
 * @property $hour_e
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee[] $employees
 * @property Empshift[] $empshifts
 * @property Employee[] $employees
 * @property Empshift[] $empshifts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Shift extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_shift', 'description', 'hour_s', 'hour_e'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'id_shift', 'fk_shift');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empshifts()
    {
        return $this->hasMany(\App\Models\Empshift::class, 'id_shift', 'fk_shift');
    }
    
    
}
