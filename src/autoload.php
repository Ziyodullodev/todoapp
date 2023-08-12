<?php

spl_autoload_register(function ($class_name)
{
    include 'handlers/'. $class_name .'.php';
});
