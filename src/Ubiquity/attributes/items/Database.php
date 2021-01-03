<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation Database.
 * usages :
 * - #[Database("dbName")]
 * - #[Database(name: "dbName")]
 *
 * Ubiquity\attributes\items$Database
 * This class is part of Ubiquity
 *
 * @author jc
 * @version 1.0.0
 *
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Database extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	public function __construct(string $name) {
		$this->name = $name;
	}
}

