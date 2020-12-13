<?php
namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;

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

	/**
	 *
	 * @var string
	 */
	public $name;

	public function __construct(string $name) {
		$this->name = $name;
	}
}

