<?php

namespace Ubiquity\attributes\items\acl;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Attribute Allow.
 * usages :
 * - #[Allow("roleName")]
 * - #[Allow(role: "roleName")]
 * - #[Allow(role: "roleName",resource: "resourceName",permission: "permissionName")]
 * - #[Allow("roleName","resourceName","permissionName")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Allow extends BaseAttribute {
	use BaseAnnotationTrait;

	public string|array $role;

	public ?string $permission;

	public ?string $resource;

	/**
	 * Allow constructor.
	 * @param string|array $role
	 * @param string|null $resource
	 * @param string|null $permission
	 */
	public function __construct(string|array $role, ?string $resource = null, ?string $permission = null) {
		$this->role = $role;
		$this->resource = $resource;
		$this->permission = $permission;
	}

}
