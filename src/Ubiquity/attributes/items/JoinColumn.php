<?php

namespace Ubiquity\attributes\items;

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
	public $className;
	public $referencedColumnName;
	public function __construct(string $name,string $className,string $referencedColumnName){
		
		
	}
}
