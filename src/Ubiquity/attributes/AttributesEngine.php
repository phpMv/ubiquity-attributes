<?php

namespace Ubiquity\attributes;

use Ubiquity\annotations\AnnotationsEngineInterface;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Database;
use Ubiquity\attributes\items\di\Autowired;
use Ubiquity\attributes\items\di\Injected;
use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\JoinColumn;
use Ubiquity\attributes\items\JoinTable;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\ManyToOne;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\rest\Authorization;
use Ubiquity\attributes\items\rest\Rest;
use Ubiquity\attributes\items\router\Delete;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Options;
use Ubiquity\attributes\items\router\Patch;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Put;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\Transformer;
use Ubiquity\attributes\items\Transient;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Yuml;

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
			'table' => Table::class,
			'database' => Database::class,
			'transient' => Transient::class,
			'yuml' => Yuml::class,
			'transformer' => Transformer::class,
			'validator' => Validator::class,
			'route' => Route::class,
			'get' => Get::class,
			'post' => Post::class,
			'put' => Put::class,
			'patch' => Patch::class,
			'delete' => Delete::class,
			'options' => Options::class,
			'rest' => Rest::class,
			'authorization' => Authorization::class,
			'autowired' => Autowired::class,
			'injected' => Injected::class
		];
	}

	public function getAnnotationByKey(?string $key = null): ?string {
		return self::$registry[$key] ?? null;
	}

	public function registerAnnotations(array $nameClasses): void {
		\array_merge(self::$registry, $nameClasses);
	}

	public function getAnnotation(object $container, string $key, array $parameters = []): ?object {
		if (isset(self::$registry[$key])) {
			$classname = self::$registry[$key];
			$container->addUse($classname);
			$reflect = new \ReflectionClass($classname);
			return $reflect->newInstanceArgs($parameters);
		}
		return null;
	}

	public function getAnnotationsStr(array $annotations, string $prefix = "\t"): string {
		$annotationsStr = '';
		$size = \count($annotations);
		if ($size > 0) {
			$annotationsStr = $prefix;
			\array_walk($annotations, function ($item) {
				return $item . '';
			});
			if ($size > 1) {
				$annotationsStr .= "\n{$prefix}" . implode("\n{$prefix}", $annotations);
			} else {
				$annotationsStr .= "\n{$prefix}" . \end($annotations);
			}
		}
		return $annotationsStr;
	}

	public static function isManyToOne(object $annotation): bool {
		return $annotation instanceof JoinColumn;
	}

	public static function isMany(object $annotation): bool {
		return ($annotation instanceof OneToMany) || ($annotation instanceof ManyToMany);
	}

	public function is(string $key, object $annotation): bool {
		$class = self::$registry[$key] ?? null;
		if ($class !== null) {
			return $annotation instanceof $class;
		}
		return false;
	}
}

