<?php

namespace App;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * class Customer
 *
 * @property string $name
 * @property string $email
 * @property int $active
 * @mixin Illuminate\Database\Eloquent\Model
 * @package App
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers inActive()
 */
class Customers extends Model
{
    // Fillable mass assign enable
    protected $fillable = ['name', 'email', 'active'];

    // cannot be mass assign
    protected $guarded = [];
    /**
     * scopeActive
     *
     * @param QueryBuilder $query
     * @return QueryBuilder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * scopeInActive
     *
     * @param QueryBuilder $query
     * @return QueryBuilder
     */
    public function scopeInActive($query)
    {
        return $query->where('active', 0);
    }
}
