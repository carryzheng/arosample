<?php

function __autoload($classname) {
    require_once ('Generator/' . $classname . '.php');
}