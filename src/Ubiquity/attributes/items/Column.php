<?php
namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation Column.
 * usages :
 * - #[Column("columnName")]
 * - #[Column(name: "columnName")]
 * - #[Column(name: "columnName",nullable: true)]
 * - #[Column(name: "columnName",dbType: "typeInDb")]
 *
 * Ubiquity\attributes\items$Column
 * This class is part of Ubiquity
 *
 * @author jc
 * @version 1.0.0
 *
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Column extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	public bool $nullable = false;

	public string $dbType;

	public function __construct(string $name, bool $nullable = false, string $dbType = '') {
		$this->name = $name;
		$this->nullable = $nullable;
		$this->dbType = $dbType;
	}
}

