<?php

declare(strict_types = 1);

namespace LanguageDetection\Tests;

use LanguageDetection\Trainer;

/**
 * Class TrainerTest
 *
 * @author Patrick Schur
 * @package LanguageDetector
 */
class TrainerTest extends \PHPUnit_Framework_TestCase
{
    public function testFilesAreReadable()
    {
        foreach (new \GlobIterator(__DIR__ . '/../etc/[^_]*') as $file)
        {
            $this->assertIsReadable($file->getPathname());
        }
    }

    public function testFileIsWriteable()
    {
        $this->assertIsWritable(__DIR__ . '/../etc/_langs.json');
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMinLengthGreaterThanMaxLength()
    {
        $t = new Trainer();

        $t->setMinLength(42);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMinLengthLessThanZero()
    {
        $t = new Trainer();

        $t->setMinLength(-42);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMaxLengthLessThanMinLength()
    {
        $t = new Trainer();

        $t->setMaxLength(0);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMaxNgramsEqualToZero()
    {
        $t = new Trainer();

        $t->setMaxNGrams(0);
    }

    /**
     * @expectedException \LogicException
     */
    public function testExceptionIsMaxNgramsLessThanZero()
    {
        $t = new Trainer();

        $t->setMaxNGrams(-2);
    }
}