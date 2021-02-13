<?php

namespace App\Service;

class BodyPartsService
{
    /**
     * @param $name
     * @return string
     */
    public function tester($name)
    {
        return 'Hello, '.$name;
    }

    /**
     * @param $name
     * @return string
     */
    public function another($name)
    {
        return 'Hello, '.$name;
    }
}
