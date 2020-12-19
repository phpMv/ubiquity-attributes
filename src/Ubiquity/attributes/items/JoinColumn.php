<?php

namespace Ubiquity\attributes\items;

use Attribute;

/**
 * Annotation JoinColumn.
 * usages :
 * - #[JoinColumn(className: "modelClassname")]
 * - #[JoinColumn(className: "modelClassname",referencedColumnName: "columnName")]
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class JoinColumn extends Column {
	public string $className;
	public string $referencedColumnName;

	public function __construct(string $name, string $className, string $referencedColumnName) {
		parent::__construct($name);
		$this->className = $className;
		$this->referencedColumnName = $referencedColumnName;
	}
}
