<?php

namespace Noxlogic\ShortId\Tests\Generator;

abstract class GeneratorTestCase extends \PHPUnit_Framework_TestCase
{
    public function generateDataProvider()
    {
        return array(
            array(0, "badf00d", "00000000000badf00d"),
            array(100, "badf00d", "00003200000badf00d"),
            array(1000010, "badf00d", "07a12500000badf00d"),
            array(15000020, "badf00d", "7270ea00000badf00d"),
            array(31536030, "badf00d", "f099cf00000badf00d"),

            array(0, "", "000000000000000000"),
            array(100, "", "000032000000000000"),
            array(199, "", "000063800000000000"),
            array(1000000, "", "07a120000000000000"),
            array(1000010, "", "07a125000000000000"),
            array(15000000, "", "7270e0000000000000"),
            array(15000020, "", "7270ea000000000000"),
            array(31536000, "", "f099c0000000000000"),
            array(31536030, "", "f099cf000000000000"),

            array(0, "9636dc4eae6d2e16", "0000005c4eae6d2e16"),
            array(100, "9636dc4eae6d2e16", "0000325c4eae6d2e16"),
            array(1000010, "9636dc4eae6d2e16", "07a1255c4eae6d2e16"),
            array(15000020, "9636dc4eae6d2e16", "7270ea5c4eae6d2e16"),
            array(31536030, "9636dc4eae6d2e16", "f099cf5c4eae6d2e16"),
        );
    }

}
