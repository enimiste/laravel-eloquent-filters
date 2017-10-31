<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 31/10/2017
 * Time: 19:01
 */

namespace Com\NickelIT\Filterables;


interface FiltersBag
{
    /**
     * @param array $except
     * @return array
     */
    function except($except = []): array;

    /**
     * @param array $only
     * @return array
     */
    function only($only = []): array;

    /**
     * @return array
     */
    function all(): array;
}