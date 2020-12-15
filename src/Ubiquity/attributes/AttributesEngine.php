<?php

namespace Ubiquity\attributes;

use Ubiquity\annotations\AnnotationsEngineInterface;
use Ubiquity\attributes\items\JoinTable;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\OneToMany;

class AttributesEngine implements AnnotationsEngineInterface {

	protected static array $registry;

	protected function attributesNewInstances(array $attributes): array {
		$result = [];
		foreach ($attributes as $attribute) {
			$result[] = $attribute->newInstance();
		}
		return $result;
	}

	public function getAnnotsOfClass(string $class, ?string $annotationType = null): array {
		$reflect = new \ReflectionClass($class);
		$annotClass = $this->getAnnotationByKey($annotationType);
		return $this->attributesNewInstances($reflect->getAttributes($annotClass));
	}

	public function getAnnotsOfMethod(string $class, string $method, ?string $annotationType = null): array {
		$reflect = new \ReflectionMethod($class, $method);
		$annotClass = $this->getAnnotationByKey($annotationType);
		return $this->attributesNewInstances($reflect->getAttributes($annotClass));
	}

	public function getAnnotsOfProperty(string $class, string $property, ?string $annotationType = null): array {
		$reflect = new \ReflectionProperty($class, $property);
		$annotClass = $this->getAnnotationByKey($annotationType);
		return $this->attributesNewInstances($reflect->getAttributes($annotClass));
	}

	public function start(string $cacheDirectory): void {
		self::$registry = [
			'id' => Id::class,
			'column' => Column::class,
			'joinColumn' => JoinColumn::class,
			'joinTable' => JoinTable::class,
			'manyToMany' => ManyToMany::class,
			'manyToOne' => ManyToOne::class,
			'oneToMany' => OneToMany::class,
			'route' => Route::class
		];
	}

	public function getAnnotationByKey(?string $key = null): ?string {
		return self::$registry[$key] ?? null;
	}

	public function registerAnnotations(array $nameClasses): void {
		\array_merge(self::$registry, $nameClasses);
	}

	public static function getAnnotation(string $key, array $parameters = []): ?object {
		if (isset(self::$registry[$key])) {
			$classname = self::$registry[$key];
			$reflect = new \ReflectionClass($classname);
			return $reflect->newInstanceArgs($parameters);
		}
		return null;
	}
}

