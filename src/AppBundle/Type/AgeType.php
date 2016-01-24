<?php

namespace AppBundle\Type;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class AgeType extends EnumType
{
    protected $name = 'age';

    const Early = 1;
    const Middle = 2;
    const Late = 3;

    public function getValues()
    {
        return array(
            self::Early,
            self::Middle,
            self::Late
        );
    }
}
