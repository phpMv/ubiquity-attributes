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

	protected \ReflectionClass $reflect;

	protected function asAnnotation(): string {
		$fields = $this->getPropertiesAndValues();
		return UArray::asPhpAttribute($fields);
	}

	protected function getReflectionClass(): \ReflectionClass {
		return $this->reflect ??= new \ReflectionClass($this);
	}

	public function getNamespace(): string {
		return $this->getReflectionClass()->getNamespaceName();
	}

	public function __toString(): string {
		$extsStr = $this->asAnnotation();
		$className = $this->getReflectionClass()->getShortName();
		return '#[' . $className . $extsStr . ']';
	}
}

