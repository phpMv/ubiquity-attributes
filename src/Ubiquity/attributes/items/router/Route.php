<?php
namespace Ubiquity\attributes\items\router;

use Attribute;
use Ubiquity\annotations\BaseAnnotationTrait;
use Ubiquity\attributes\items\BaseAttribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Route extends BaseAttribute{
	use BaseAnnotationTrait;
	public $path;
	public $methods;
	public $name;
	public $cache;
	public $duration;
	public $inherited;
	public $automated;
	public $requirements;
	public $priority;
	
	public function __construct($path='',$methods=[],$name=null,$cache=false,$duration=0,$inherited=false,$automated=false,$requirements=[],$priority=0){
		$this->path=$path;
		$this->methods=$methods;
		$this->name=$name;
		$this->cache=$cache;
		$this->duration=$duration;
		$this->inherited=$inherited;
		$this->automated=$automated;
		$this->requirements=$requirements;
		$this->priority=$priority;
	}
}

