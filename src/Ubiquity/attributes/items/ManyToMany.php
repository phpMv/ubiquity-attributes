<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation ManyToMany.
 * usages :
 * - #[ManyToMany(targetEntity: "classname")]
 * - #[ManyToMany(targetEntity: "classname",inversedBy: "memberName")]
 * - #[ManyToMany(targetEntity: "classname",inversedBy: "memberName",mappedBy: "memberName")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class ManyToMany extends BaseAttibute {
	use BaseAnnotationTrait;
	
	public $targetEntity;
	public $inversedBy;
	public $mappedBy;
	
	public function __construct(string $targetEntity,?string $inversedBy=null,?string $mappedBy=null) {
		$this->targetEntity=$targetEntity;
		$this->inversedBy=$inversedBy;
		$this->mappedBy=$mappedBy;
	}
}
