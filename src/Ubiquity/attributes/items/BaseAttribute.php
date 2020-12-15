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

	public function asAnnotation(): string {
		return $this->__toString();
	}

	public function getNamespace(): string {
		return (new \ReflectionClass($this))->getNamespaceName();
	}

	public function __toString(): string {
		$fields = $this->getPropertiesAndValues();
		$extsStr = UArray::asPhpAttribute($fields);
		$className = (new \ReflectionClass($this))->getShortName();
		return '#[' . $className . $extsStr . ']';
	}
}

