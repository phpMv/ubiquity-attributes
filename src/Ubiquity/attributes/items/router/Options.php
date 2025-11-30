<?php

namespace Ubiquity\attributes\items\router;

use Attribute;

/**
 * Defines a route with the `options` method
 * Ubiquity\attributes\items\router$Options
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.1
 *
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Options extends Route {

	/**
	 * Options constructor.
	 */
	public function __construct(string $path = '', ?string $name = null, bool $cache = false, int $duration = 0, bool $inherited = false, bool $automated = false, array $requirements = [], int $priority = 0) {
		parent::__construct($path, ['options'], $name, $cache, $duration, $inherited, $automated, $requirements, $priority);
	}
}

