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
 * - #[Permission(permissionLevel)]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Permission extends BaseAttribute {
	use BaseAnnotationTrait;

	public string|int|null $name;

	public ?int $level;

	/**
	 * Permission constructor.
	 * @param string|int $name
	 * @param int|null $level
	 */
	public function __construct(string|int $name, ?int $level = 0) {
		$this->name = $name;
		$this->level = $level;
	}


}
