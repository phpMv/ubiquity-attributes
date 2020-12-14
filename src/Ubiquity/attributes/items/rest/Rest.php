<?php

namespace Ubiquity\attributes\items\rest;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute Rest.
 * usages :
 * - #[Rest]
 * - #[Rest(resource: "modelClassname")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Rest extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $resource;

	/**
	 * Rest constructor.
	 * @param string $resource
	 */
	public function __construct(string $resource) {
		$this->resource = $resource;
	}

}
