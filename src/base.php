<?php

declare(strict_types=1);

/**
 * Takes the names of the called functions and returns the Composition class instance.
 * The result of the right function is an input parameter for the left function.
 *
 * c('f1', 'f2')($val) === f1(f2($val))
 *
 * @param mixed ...$args
 * @return Composition
 */
function c(...$args): Composition
{
    $param = (count($args) == 1) ? $args[0] : $args;
    return new Composition($param);
}

/**
 * Creates an instance of the PartialExecutor for the given function
 *
 * f(a,b,c) == pe('f', b, c)(a) == pe('f', c)(a,b)
 *
 * @param string|array $func function
 * @param mixed ...$params
 * @return PartialExecutor
 */
function pe($func, ...$params): PartialExecutor
{
    return new PartialExecutor($func, $params);
}

class Composition
{
    private array $funcs = [];

    public function __construct(array $funcs)
    {
        foreach ($funcs as $func) {
            array_unshift($this->funcs, $this->prepareExecutor($func));
        }
    }

    /**
     * The function creates an instance of the PartialExecutor class, if necessary.
     * @param $func array|string|PartialExecutor function
     * @return PartialExecutor
     */
    private function prepareExecutor($func): PartialExecutor
    {
        if (is_string($func) || is_array($func)) {
            return pe($func);
        }
        if (is_object($func) && $func instanceof PartialExecutor) {
            return $func;
        }
        throw new LogicException("Construct " . __CLASS__ . " incorrect parameter '$func'");
    }

    public function __invoke()
    {
        $result = func_get_args();
        foreach ($this->funcs as $func) {
            $result = $func($result);
        }
        return $result;
    }
}

class PartialExecutor
{
    /**
     * @var string|array Callable function
     */
    private $func;

    /**
     * @var array params of given function
     */
    private array $params = [];

    public function __construct($func, ...$params)
    {
        $this->func = $func;
        $this->params = (count($params) == 1 && is_array($params[0])) ? $params[0] : $params;
    }

    public function __invoke(...$params)
    {
        $params = (count($params) == 1 && is_array($params[0])) ? $params[0] : $params;
        $params = array_merge($params, $this->params);
        return call_user_func_array($this->func, $params);
    }
}
