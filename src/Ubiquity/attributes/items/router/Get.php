<?php

/**
 * Router annotations
 */

namespace Ubiquity\attributes\items\router;

/**
 * Defines a route with the `get` method
 * Ubiquity\attributes\items\router$Get
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.0
 *
 */
class Get extends Route {

	/**
	 * Get constructor.
	 */
	public function __construct(string $path = '', string $name = null, bool $cache = false, int $duration = 0, bool $inherited = false, bool $automated = false, array $requirements = [], int $priority = 0) {
		parent::__construct($path, 'get', $name, $cache, $duration, $inherited, $automated, $requirements, $priority);
	}
}

