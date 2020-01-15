<?php

declare(strict_types=1);

namespace Boekuwzending\Tests;

use Faker\Factory;
use Faker\Generator;

/**
 * Class FakerTrait.
 */
trait FakerTrait
{
    /**
     * @var Generator
     */
    private $faker;

    /**
     * @return Generator
     */
    private function getFaker(): Generator
    {
        if (null === $this->faker) {
            $this->faker = Factory::create();
        }

        return $this->faker;
    }
}
