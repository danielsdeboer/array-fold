<?php

namespace Aviator\ArrayFold\Tests;

use PHPUnit\Framework\TestCase;

class ArrayFoldTest extends TestCase
{
    /**
     * @var array
     */
    protected $singleLevelArray = [
        'test' => [
            'array' => 'stuff'
        ]
    ];

    protected $multiLevelArray = [
        'level1' => [
            'level2' => [
                'non-unique' => 'value',
                'level3' => [
                    'unique' => 'value',
                    'non-unique' => 'value'
                ]
            ]
        ]
    ];

    /** @test */
    public function it_exists ()
    {
        $this->assertTrue(function_exists('array_fold'));
    }

    /** @test */
    public function it_folds_a_multidimensional_array_of_one_level ()
    {
        $result = array_fold($this->singleLevelArray);
        $expected = ['array' => 'stuff'];

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_folds_multiple_levels_and_overrwrites_keys ()
    {
        $result = array_fold($this->multiLevelArray);
        $expected = [
            'non-unique' => 'value',
            'unique' => 'value'
        ];

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_optionally_strips_keys_and_returns_all_values ()
    {
        $result = array_fold($this->multiLevelArray, false);
        $expected = [
            'value',
            'value',
            'value'
        ];

        $this->assertSame($expected, $result);
    }
}