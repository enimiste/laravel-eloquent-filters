<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 31/10/2017
 * Time: 18:57
 */

namespace Com\NickelIT\Filterables;


use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilters implements QueryFiltersInterface
{
    /** @var array */
    protected $guarded = ['apply', '__construct', 'filters'];

    /** @var FiltersBag */
    private $filterBag;
    /** @var  Builder */
    private $builder;

    /**
     * RequestQueryFilters constructor.
     * @param FiltersBag $filterBag
     */
    public function __construct(FiltersBag $filterBag)
    {
        $this->filterBag = $filterBag;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    function apply(Builder $builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                if (strlen($value)) {
                    $this->$name($value);
                } else {
                    $this->$name();
                }
            }
        }
        return $builder;
    }

    /**
     * @return array hash map
     */
    function filters(): array
    {
        return $this->filterBag->except($this->guarded);
    }

    /**
     * @return Builder
     */
    function builder(): Builder
    {
        return $this->builder;
    }
}