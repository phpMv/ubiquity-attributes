<?php

namespace Ubiquity\attributes\items\acl;


use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute Resource.
 * usages :
 * - #[Resource("resourceName")]
 * - #[Resource(name: "resourceName")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Resource extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	/**
	 * Resource constructor.
	 * @param string $name
	 */
	public function __construct(string $name) {
		$this->name = $name;
	}

}
