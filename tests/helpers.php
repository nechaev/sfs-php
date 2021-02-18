<?php

function add3($val)
{
    return $val + 3;
}

function produce3($val)
{
    return $val * 3;
}

class Foo
{
    function baz($arg)
    {
        return (string)$arg;
    }

    public static function st($val)
    {
        return $val;
    }
}
