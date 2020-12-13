<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation JoinTable.
 * usages :
 * - #[JoinTable(name: "tableName")]
 * - #[JoinTable(name: "tableName",joinColumns: "fieldname")]
 * - #[JoinTable(name: "tableName",joinColumns: "fieldname",inverseJoinColumns: "fieldname")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class JoinTable extends BaseAttribute {
	use BaseAnnotationTrait;
	
	public string $name;
	public string $joinColumns;
	public string $inverseJoinColumns;
	
	public function __construct(string $name,string $joinColumns,string $inverseJoinColumns){
		$this->name=$name;
		$this->joinColumns=$joinColumns;
		$this->inverseJoinColumns=$inverseJoinColumns;
	}
	
}
