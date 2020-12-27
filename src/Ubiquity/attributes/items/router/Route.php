<?php

namespace Ubiquity\attributes\items\router;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

/**
 * Defines a route.
 * usages :
 * - #[Route("routePath")] default path: ""
 * - #[Route(path: "routePath")]
 * - #[Route("routePath",methods:["routeMethods"])]
 * - #[Route("routePath",cache: true, duration: intValue)]
 * - #[Route("routePath",inherited: true)]
 * - #[Route("routePath",automated: true)]
 * - #[Route("routePath",requirements: ["member"=>"regExpr"])]
 * - #[Route("routePath",priority: intValue)]
 * - #[Route("routePath",name: "routeName")] default routeName: controllerName_actionName
 *
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Route extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $path;
	public ?array $methods;
	public ?string $name;
	public bool $cache;
	public int $duration;
	public bool $inherited;
	public bool $automated;
	public array $requirements;
	public int $priority;

	public function __construct(string $path = '', ?array $methods = null, ?string $name = null, ?bool $cache = false, ?int $duration = 0, ?bool $inherited = false, ?bool $automated = false, ?array $requirements = [], int $priority = 0) {
		$this->path = $path ?? '';
		$this->methods = $methods;
		$this->name = $name;
		$this->cache = $cache;
		$this->duration = $duration;
		$this->inherited = $inherited;
		$this->automated = $automated;
		$this->requirements = $requirements;
		$this->priority = $priority;
	}

	public function getPropertiesAndValues($props = null) {
		$r = parent::getPropertiesAndValues($props);
		if (\is_subclass_of($this, Route::class)) {
			unset($r['methods']);
		}
		return $r;
	}
}

