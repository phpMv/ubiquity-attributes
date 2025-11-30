<?php

namespace Ubiquity\attributes\items\router;

use Attribute;

/**
 * Defines a route with the `patch` method
 * Ubiquity\attributes\items\router$Patch
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.1
 *
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Patch extends Route {

	/**
	 * Patch constructor.
	 */
	public function __construct(string $path = '', ?string $name = null, bool $cache = false, int $duration = 0, bool $inherited = false, bool $automated = false, array $requirements = [], int $priority = 0) {
		parent::__construct($path, ['patch'], $name, $cache, $duration, $inherited, $automated, $requirements, $priority);
	}
}

