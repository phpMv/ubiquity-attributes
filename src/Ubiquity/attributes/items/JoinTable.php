<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation JoinTable.
 * usages :
 * - #[JoinTable(name: "tableName")]
 * - #[JoinTable(name: "tableName",joinColumns: ["fieldname"=>"value"])]
 * - #[JoinTable(name: "tableName",joinColumns: ["fieldname"=>"value"],inverseJoinColumns: ["fieldname"=>"value"])]
 *
 * @author jc
 * @version 1.0.1
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class JoinTable extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;
	public ?array $joinColumns;
	public ?array $inverseJoinColumns;

	public function __construct(string $name, ?array $joinColumns = null, ?array $inverseJoinColumns = null) {
		$this->name = $name;
		$this->joinColumns = $joinColumns;
		$this->inverseJoinColumns = $inverseJoinColumns;
	}

}
