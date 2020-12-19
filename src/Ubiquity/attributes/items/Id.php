<?php

namespace Ubiquity\attributes\items;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;

/**
 * Attribute Id.
 * usage : #[Id]
 *
 * Ubiquity\attributes\items$Id
 * This class is part of Ubiquity
 *
 * @author jc
 * @version 1.0.0
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Id extends BaseAttribute {
	use BaseAnnotationTrait;
}

