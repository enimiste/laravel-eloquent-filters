<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 31/10/2017
 * Time: 19:05
 */

namespace Com\NickelIT\Filterables;


use Illuminate\Http\Request;

class HttpRequestFiltersBag implements FiltersBag
{
    /**
     * @var Request
     */
    private $request;

    /**
     * HttpRequestFiltersBag constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param array $except
     * @return array
     */
    function except($except = []): array
    {
        return $this->request->except($except);
    }

    /**
     * @param array $only
     * @return array
     */
    function only($only = []): array
    {
        return $this->request->only($only);
    }

    /**
     * @return array
     */
    function all(): array
    {
        return $this->request->all();
    }
}