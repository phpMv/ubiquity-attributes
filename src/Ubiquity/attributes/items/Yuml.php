<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Attribute;

/**
 * Annotation Yuml.
 * #[Yuml(color:"color",note:"content")
 *
 * @author jc
 * @version 1.0.0
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Yuml extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $color;
	public string $note;

	/**
	 * Yuml constructor.
	 * @param string $color
	 * @param string $note
	 */
	public function __construct(string $color, string $note) {
		$this->color = $color;
		$this->note = $note;
	}
}
