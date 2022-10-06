<?php

namespace iqual\ReusableDrupalTests;

/**
 * An interface for test classes that can be used in the contenxt of either unpopulated
 * sites or DTT-populated ones.
 */
interface ReusableTestClassInterface {

    /**
     * Instantiates the current test class.
     */
    public function instantiateTestClass();

    /**
     * Asserts module dependencies are enabled.
     */
    public function assertModulesEnabled();

    /**
     * Generates a list of entities needed for tests.
     */
    public function getTestEntities();

}
