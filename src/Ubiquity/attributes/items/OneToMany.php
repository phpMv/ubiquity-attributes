<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation OneToMany.
 * usage :
 * - #[OneToMany(mappedBy:"memberName",className:"classname")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class OneToMany extends BaseAttribute {
	use BaseAnnotationTrait;
	
	public $mappedBy;
	public $fetch;
	public $className;
	
	public function __construct(string $mappedBy,string $className){
		$this->mappedBy=$mappedBy;
		$this->className=$className;
	}
}
