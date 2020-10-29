<?php

namespace Andrepgsilva\LaraArrayPagination\Factories;

abstract class Factory
{
    protected $className;
    protected $count = 1;
    protected $factoriesNamespace = 'Andrepgsilva\\LaraArrayPagination\\Factories\\';
    protected $classesNamespace = 'Andrepgsilva\\LaraArrayPagination\\Classes\\Tests\\';

    public function __construct()
    {   
        if (in_array('faker', array_keys(get_object_vars($this)))) {
            $this->setUpFaker();
        }
    }

    /**
     * Define the object default state.
     *
     * @return Array
     */
    abstract public function definition();

    /**
     * Count how many times the object will be created
     *
     * @param Integer $count Number of objects to create
     * 
     * @return Andrepgsilva\LaraArrayPagination\Factories\Factory;
     **/
    public function count($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Create a new object or Collection of objects
     *
     * @param Array $dataForOverride Override object default data
     * @param Integer $count Number of objects to create
     * 
     * @return Illuminate\Support\Collection
     **/
    public function create($dataForOverride = null)
    {
        $collection = collect();
        $classFactoryName = $this->factoriesNamespace . $this->className . 'Factory';
        $className = $this->classesNamespace . $this->className;

        for ($i = 0; $i < $this->count; $i++) {
            $factoryObject = new $classFactoryName();
            $objectDefinition = $factoryObject->definition();
            
            if ($dataForOverride !== null) {
                $objectDefinition = array_merge($objectDefinition, $dataForOverride);
            }

            $collection->push((new $className(...array_values($objectDefinition))));
        }
        
        return $collection;
    }
}