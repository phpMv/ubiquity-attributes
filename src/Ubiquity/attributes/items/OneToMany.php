<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation OneToMany.
 * usage :
 * - #[OneToMany(mappedBy:"memberName",className:"classname")]
 * - #[OneToMany(mappedBy:"memberName",className:"classname",cascade:["remove"])]
 *
 * @author jc
 * @version 1.0.1
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class OneToMany extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $mappedBy;
	public string $className;
	public ?array $cascade;

	public function __construct(string $mappedBy, string $className, ?array $cascade = null) {
		$this->mappedBy = $mappedBy;
		$this->className = $className;
		$this->cascade = $cascade;
	}
}
