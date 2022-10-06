<?php

namespace iqual\ReusableDrupalTests;

use Drupal\Component\Render\FormattableMarkup;

trait ReusableTestClassTrait
{

  // List of ephemeral entities used only during testing.
  protected $testEntities = [];

  /**
   * A test setup function that assumes and configures a vanilla Drupal instance.
   *
   * This method should make sure the minimum set of requirements for the tests at hand are met
   * without doing more than needed.
   * This is the place for calls to ::installConfig(), ::installEntitySchema() and installSchema()
   * among others.
   * This in conclusion is the place for everything that DTT would not need, but unpopulated Drupal test sites would.
   *
   * The remaining set-up of the testing environment, as is for example the creation of ephemeral
   * testing entities, and their configuration, which would be needed when running tests against DTT-populated instances
   * should be placed in the instantiateTestClass() method.
   *
   * @return void
   */
  public function setUp() {
    parent::setUp();
    $this->instantiateTestClass();
  }

  /**
   * This method is where overlapping logic for setting up tests and which is needed by both
   * DTT and unpopulated instances should be placed.
   *
   * @return void
   */
  public function instantiateTestClass() {}

  /**
   * A utility method that makes sure the ::$modules property of a test class is respected
   * as a definition of dependencies.
   *
   * @return void
   */
  public function assertModulesEnabled() {
    $modules = array_unique(array_merge(parent::$modules ?? [], static::$modules ?? []));
    foreach ($modules as $module) {
      $this->assertEquals(
        TRUE,
        \Drupal::service('module_handler')->moduleExists($module),
        new FormattableMarkup('Module "@module" is not enabled.', ['@module' => $module])
      );
    }
    return $modules;
  }

  /**
   * Undocumented function
   *
   * @return void
   */
  public function installTestModules() {
    $test_modules = array_unique(array_merge(parent::$test_modules ?? [], static::$test_modules ?? []));
    \Drupal::service('module_installer')->install($test_modules);
    return $test_modules;
  }

  /**
   * Returns a list of generated test entities.
   */
  public function getTestEntities() {
    return $this->testEntities;
  }

}
