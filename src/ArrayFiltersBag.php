<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 31/10/2017
 * Time: 19:34
 */

namespace Com\NickelIT\Filterables;


class ArrayFiltersBag implements FiltersBag
{
    /**
     * @var array
     */
    private $filters;

    /**
     * ArrayFiltersBag constructor.
     * @param array $filters
     */
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @param array $except
     * @return array
     */
    function except($except = []): array
    {
        $res = [];
        foreach ($this->filters as $name => $value) {
            if (!in_array($name, $except)) {
                $res[$name] = $value;
            }
        }
        return $res;
    }

    /**
     * @param array $only
     * @return array
     */
    function only($only = []): array
    {
        $res = [];
        foreach ($this->filters as $name => $value) {
            if (in_array($name, $only)) {
                $res[$name] = $value;
            }
        }
        return $res;
    }

    /**
     * @return array
     */
    function all(): array
    {
        return $this->filters;
    }
}