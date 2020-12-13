<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation ManyToOne.
 * usage : #[ManyToOne]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class ManyToOne extends BaseAttribute {
	use BaseAnnotationTrait;
}
