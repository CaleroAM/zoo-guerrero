<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 *
 * @property $rfc
 * @property $name
 * @property $phone
 * @property $mail
 * @property $addres
 * @property $type_sup
 * @property $created_at
 * @property $updated_at
 *
 * @property Food[] $food
 * @property Food[] $foods
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Supplier extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['rfc', 'name', 'phone', 'mail', 'addres', 'type_sup'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function food()
    {
        return $this->hasMany(\App\Models\Food::class, 'rfc', 'fk_supplier');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foods()
    {
        return $this->hasMany(\App\Models\Food::class, 'rfc', 'fk_supplier');
    }
    
}
