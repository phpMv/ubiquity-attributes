<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation ManyToMany.
 * usages :
 * - #[ManyToMany(targetEntity: "classname")]
 * - #[ManyToMany(targetEntity: "classname", inversedBy: "memberName")]
 * - #[ManyToMany(targetEntity: "classname", inversedBy: "memberName", mappedBy: "memberName")]
 * - #[ManyToMany(targetEntity: "classname", inversedBy: "memberName", mappedBy: "memberName", cascade: ["remove"])]
 *
 * @author jc
 * @version 1.0.1
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class ManyToMany extends BaseAttribute {
	use BaseAnnotationTrait;
	
	public string $targetEntity;
	public ?string $inversedBy;
	public ?string $mappedBy;
	public ?array $cascade;

	public function __construct(string $targetEntity, ?string $inversedBy = null, ?string $mappedBy = null, ?array $cascade = null) {
		$this->targetEntity = $targetEntity;
		$this->inversedBy = $inversedBy;
		$this->mappedBy = $mappedBy;
		$this->cascade = $cascade;
	}
}
