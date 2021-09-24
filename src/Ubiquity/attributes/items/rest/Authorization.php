<?php

/**
 * Rest attributes
 */

namespace Ubiquity\attributes\items\rest;

/**
 * Ubiquity\annotations\rest\Authorization
 * This file is part of Ubiquity
 */

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute Authorization.
 * usage: #[Autorization]
 *
 * @author jc
 * @version 1.0.0.1
 */
#[Attribute(Attribute::TARGET_METHOD)]
class Authorization extends BaseAttribute {
	use BaseAnnotationTrait;
}
