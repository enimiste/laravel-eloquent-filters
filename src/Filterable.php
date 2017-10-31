<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 31/10/2017
 * Time: 18:56
 */

namespace Com\NickelIT\Filterables;


use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param Builder $query
     * @param QueryFiltersInterface $queryFilters
     * @return Builder
     */
    public function scopeFilter(Builder $query, QueryFiltersInterface $queryFilters): Builder
    {
        return $queryFilters->apply($query);
    }
}