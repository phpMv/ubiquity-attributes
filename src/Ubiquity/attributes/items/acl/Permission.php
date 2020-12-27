<?php

namespace Ubiquity\attributes\items\acl;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute Permission.
 * usages :
 * - #[Permission("permissionName")]
 * - #[Permission("permissionName",permissionLevel)]
 * - #[Permission(name: "permissionName")]
 * - #[Permission(name: "permissionName",level: permissionLevel)]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Permission extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $name;

	public ?int $level;

	/**
	 * Permission constructor.
	 * @param string $name
	 * @param int|null $level
	 */
	public function __construct(string $name, ?int $level = 0) {
		$this->name = $name;
		$this->level = $level;
	}


}
