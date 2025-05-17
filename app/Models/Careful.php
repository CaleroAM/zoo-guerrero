<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Careful
 *
 * @property $id_careful
 * @property $date_start
 * @property $hours
 * @property $treatment
 * @property $amount_food
 * @property $fk_food
 * @property $fk_employee
 * @property $fk_animal
 * @property $created_at
 * @property $updated_at
 *
 * @property Animal $animal
 * @property Employee $employee
 * @property Food $food
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Careful extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'carefuls';
    protected $primaryKey = 'id_careful';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['id_careful', 'date_start', 'hours', 'treatment', 'amount_food', 'fk_food', 'fk_employee', 'fk_animal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(\App\Models\Animal::class, 'fk_animal', 'id_animal');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'fk_employee', 'id_employee');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food()
    {
        return $this->belongsTo(\App\Models\Food::class, 'fk_food', 'id_food');
    }
    
}
