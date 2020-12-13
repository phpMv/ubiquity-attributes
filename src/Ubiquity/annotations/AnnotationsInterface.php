<?php
namespace Ubiquity\annotations;

/**
 * Ubiquity\annotations$AnnotationsInterface
 * This class is part of Ubiquity
 *
 * @author jc
 * @version 1.0.0
 *
 */
interface AnnotationsInterface {

	/**
	 * Start the annotations engine for dev mode.
	 *
	 * @param string $cacheDirectory
	 */
	public function start(string $cacheDirectory): void;

	/**
	 *
	 * @param array $nameClasses
	 *        	an array of name=>class annotations
	 */
	public function registerAnnotations(array $nameClasses): void;

	/**
	 *
	 * @param string $class
	 * @param string $annotationType
	 * @return array
	 */
	public function getAnnotsOfClass(string $class, string $annotationType = null): array;

	/**
	 *
	 * @param string $class
	 * @param string $method
	 * @param string $annotationType
	 * @return array
	 */
	public function getAnnotsOfMethod(string $class, string $method, string $annotationType = null): array;

	/**
	 *
	 * @param string $class
	 * @param string $property
	 * @param string $annotationType
	 * @return array
	 */
	public function getAnnotsOfProperty(string $class, string $property, string $annotationType = null): array;

	/**
	 *
	 * @param string $key
	 * @return string|NULL
	 */
	public function getAnnotationByKey(string $key): ?string;
}

