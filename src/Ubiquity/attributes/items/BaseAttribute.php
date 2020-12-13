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

	protected function asAnnotation(): string {
		$fields = $this->getPropertiesAndValues();
		return UArray::asPhpAttribute($fields);
	}

	public function getNamespace(): string {
		return (new \ReflectionClass($this))->getNamespaceName();
	}

	public function __toString(): string {
		$extsStr = $this->asAnnotation();
		$className = (new \ReflectionClass($this))->getShortName();
		return '#[' . $className . $extsStr . ']';
	}
}

