<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\utils\base\UArray;

/**
 * Ubiquity\attributes$BaseAttribute
 * This class is part of Ubiquity
 * @author jc
 * @version 1.0.0
 *
 */
abstract class BaseAttribute {
	use BaseAnnotationTrait;

	public function __construct() {

	}

	public function asAnnotation(): string {
		return $this->__toString();
	}

	public function getNamespace(): string {
		return (new \ReflectionClass($this))->getNamespaceName();
	}

	protected function getDefaultParameters(): array {
		$r = new \ReflectionMethod(get_class($this), '__construct');
		$result = [];
		foreach ($r->getParameters() as $param) {
			if ($param->isOptional() && $param->isDefaultValueAvailable()) {
				$result[$param->getName()] = $param->getDefaultValue();
			}
		}
		return $result;
	}

	public function __toString(): string {
		$fields = $this->getPropertiesAndValues();
		$extsStr = UArray::asPhpAttribute($fields);
		$className = (new \ReflectionClass($this))->getShortName();
		return '#[' . $className . $extsStr . ']';
	}
}

