<?php

namespace Swandam\Core\Foundation;

class Swandam
{
    public function __construct()
    {
        view()->share("swandam", $this);
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        if (method_exists(self::class, $name)) {
            $this->$name = $this->$name();
        }

        if (isset($this->$name)) {
            return $this->$name;
        }
        return null;
    }
}