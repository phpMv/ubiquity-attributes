<?php
namespace Ubiquity\attributes;

use Ubiquity\annotations\AnnotationsEngineInterface;

class AttributesEngine implements AnnotationsEngineInterface {

	/**
	 *
	 * @var array
	 */
	protected $register;

	protected function attributesNewInstances(array $attributes) {
		$result = [];
		foreach ($attributes as $attribute) {
			$result[] = $attribute->newInstance();
		}

		return $result;
	}

	public function getAnnotsOfClass(string $class, string $annotationType = null): array {
		$reflect = new \ReflectionClass($class);
		return $this->attributesNewInstances($reflect->getAttributes($annotationType));
	}

	public function getAnnotsOfMethod(string $class, string $method, string $annotationType = null): array {
		$reflect = new \ReflectionMethod($class, $method);
		return $this->attributesNewInstances($reflect->getAttributes($annotationType));
	}

	public function getAnnotsOfProperty(string $class, string $property, string $annotationType = null): array {
		$reflect = new \ReflectionProperty($class, $property);
		return $this->attributesNewInstances($reflect->getAttributes($annotationType));
	}

	public function start(string $cacheDirectory): void {
		$this->register = [
			'id' => Id::class,
			'column'=>Column::class,
			'joinColumn'=>JoinColumn::class,
			'route' => Route::class
		];
	}

	public function getAnnotationByKey(string $key): ?string {
		return $this->register[$key] ?? null;
	}

	public function registerAnnotations(array $nameClasses): void {}
}

