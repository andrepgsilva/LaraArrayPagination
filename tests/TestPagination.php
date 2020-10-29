<?php

use Andrepgsilva\LaraArrayPagination\Classes\ArrayPaginator;
use Andrepgsilva\LaraArrayPagination\Factories\DummyElementFactory;

class TestPagination extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Andrepgsilva\LaraArrayPagination\Providers\LaraArrayPaginationServiceProvider'];
    }

    public function test_pagination_with_array()
    {
        $paginator = new ArrayPaginator();
        $objects = (new DummyElementFactory())->count(19)->create()->all();
        $paginatedContent = $paginator->paginate($objects);

        $this->assertCount(3, $paginatedContent->items());
    }

    public function test_pagination_when_it_insert_a_collection()
    {
        $paginator = new ArrayPaginator();
        $objects = (new DummyElementFactory())->count(19)->create();
        
        $this->expectException(\TypeError::class);

        $paginator->paginate($objects);
    }
}