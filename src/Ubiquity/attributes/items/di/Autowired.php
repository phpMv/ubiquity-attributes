<?php

/**
 * Dependency injection annotations
 */

namespace Ubiquity\attributes\items\di;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute for autowiring.
 * usage : #[Autowired]
 * @author jc
 * @version 1.0.0
 * @since Ubiquity 2.1.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Autowired extends BaseAttribute {
	use BaseAnnotationTrait;
}
