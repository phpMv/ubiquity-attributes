<?php

namespace Ubiquity\attributes\items\router;

use Ubiquity\attributes\items\BaseAttribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation NoRoute.
 * usage : #[NoRoute]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_METHOD)]
class NoRoute extends BaseAttribute {
	use BaseAnnotationTrait;
}
