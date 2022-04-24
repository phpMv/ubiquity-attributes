<?php

namespace Ubiquity\attributes\items\di;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute for dependency injection.
 * usages :
 * - #[Injected]
 * - #[Injected(name)]
 * - #[Injected(name,code)]
 *
 * @author jc
 * @version 1.0.0
 * @since Ubiquity 2.1.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Injected extends BaseAttribute {
	use BaseAnnotationTrait;

	public ?string $name;
	public ?string $code;

	/**
	 * Injected constructor.
	 * @param null|string $name
	 * @param null|string $code
	 */
	public function __construct(?string $name = null, ?string $code = null) {
		$this->name = $name;
		$this->code = $code;
	}

}
