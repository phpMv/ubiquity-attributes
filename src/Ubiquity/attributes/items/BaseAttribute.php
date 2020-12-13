<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;

/**
 * Ubiquity\attributes$BaseAttribute
 * This class is part of Ubiquity
 * @author jc
 * @version 1.0.0
 *
 */
abstract class BaseAttribute {
	use BaseAnnotationTrait;

	public function __toString() {
		$extsStr = $this->asAnnotation();
		$className = (new \ReflectionClass($this))->getShortName();
		return '#[' . \lcfirst($className) . $extsStr . ']';
	}
}

