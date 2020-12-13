<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation Table.
 * usages :
 * - #[Table("tableName")]
 * - #[Table(name: "tableName")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Table extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}
}
