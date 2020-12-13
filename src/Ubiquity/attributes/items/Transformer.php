<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation Transformer.
 * usage :
 * - #[Transformer(name: "transformerName")]
 * - #[Transformer("transformerName")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Transformer extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}
}
