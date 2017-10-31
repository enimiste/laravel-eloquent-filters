<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 31/10/2017
 * Time: 18:54
 */

namespace Com\NickelIT\Filterables;


use Illuminate\Database\Eloquent\Builder;

interface QueryFiltersInterface
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    function apply(Builder $builder): Builder;

    /**
     * @return array hash map
     */
    function filters(): array;

    /**
     * @return Builder
     */
    function builder(): Builder;
}