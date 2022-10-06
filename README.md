# Reusable Drupal Tests

## Introduction

This tiny framework is meant to allow Drupal test authors to "decouple" their test classes from the PHPUnit/Drupal test framework(s).

This framework came into existence in order to support the following idea:

1. Write a test class following a loose coupling approach as far as the configuration and instantiation of the Drupal testing instance goes.
2. Use the test class in the context of either a vanilla Drupal instance (classic Drupal testing approach) or against an already functioning Drupal instance (skipping the ::setUp() method). 

## Installation

- Install via Composer: `composer require iqual/reusable-drupal-tests --dev`.

## Updating existing Drupal tests into reusable Drupal tests

## Using together with Drupal Test Traits
