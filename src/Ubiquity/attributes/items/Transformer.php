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
 * @version 1.0.1
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Transformer extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	public function isSameAs(BaseAnnotationTrait $annot): bool {
		return \get_class($annot) === self::class && $this->name == $annot->name;
	}

}
