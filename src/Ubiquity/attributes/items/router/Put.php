<?php

namespace Ubiquity\attributes\items\router;

/**
 * Defines a route with the `put` method
 * Ubiquity\attributes\items\router$Put
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.0
 *
 */
class Put extends Route {

	/**
	 * Put constructor.
	 */
	public function __construct(string $path = '', string $name = null, bool $cache = false, int $duration = 0, bool $inherited = false, bool $automated = false, array $requirements = [], int $priority = 0) {
		parent::__construct($path, 'put', $name, $cache, $duration, $inherited, $automated, $requirements, $priority);
	}
}

