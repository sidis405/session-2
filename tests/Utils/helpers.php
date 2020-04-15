<?php

function create($model, $attributes = [], $times = null, $states = [])
{
    return factory($model, $times)->states($states)->create($attributes);
}

function make($model, $attributes = [], $times = null, $states = [])
{
    return factory($model, $times)->states($states)->make($attributes);
}
