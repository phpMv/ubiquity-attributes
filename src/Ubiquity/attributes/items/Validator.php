<?php

namespace Ubiquity\attributes\items;

use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\contents\validation\ValidatorsManager;
use Ubiquity\utils\base\UArray;
use Attribute;

/**
 * Validator annotation.
 * usages :
 * - #[Validator(type: "validatorType")]
 * - #[Validator(type: "validatorType",message: "validatorMessage")]
 * - #[Validator(type: "validatorType",severity: "level")]
 * - #[Validator(type: "validatorType",group: "validatorGroup")]
 * - #[Validator(type: "validatorType",constraints: [constraints])]
 *
 * @author jc
 * @version 1.0.0
 * @category annotations
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class Validator extends BaseAttribute {
	use BaseAnnotationTrait;

	public string $type;
	public ?string $message;
	public ?string $severity;
	public ?string $group;
	public ?array $constraints = [];

	/**
	 * Validator constructor.
	 * @param string $type
	 * @param string|array|null $constraints
	 * @param string|null $message
	 * @param string|null $severity
	 * @param string|null $group
	 * @throws \Exception
	 */
	public function __construct(string $type, null|string|array $constraints = null, ?string $message = null, ?string $severity = null, ?string $group = null) {
		if (!isset (ValidatorsManager::$validatorTypes [$type])) {
			throw new \Exception ('This type does not exists : ' . $type);
		}
		$this->type = $type;
		$this->message = $message;
		$this->severity = $severity;
		$this->group = $group;
		if (!\is_array($constraints)) {
			$this->constraints['ref'] = $constraints;
		} else {
			$this->constraints = $constraints;
		}
	}

	public function asAnnotation(): string {
		$fields = $this->getPropertiesAndValues();
		$result = [];
		$result [] = $fields ["type"];
		unset ($fields ["type"]);
		if (isset ($fields ["constraints"]) && isset ($fields ["constraints"] ["ref"])) {
			$result [] = $fields ["constraints"] ["ref"];
			unset ($fields ["constraints"] ["ref"]);
		}
		if (sizeof($fields) > 0) {
			foreach ($fields as $field => $value) {
				if ((is_array($value) && sizeof($value) > 0) || !is_array($value)) {
					$result [$field] = $value;
				}
			}
		}
		return UArray::asPhpArray($result);
	}
}
