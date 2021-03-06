<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create(string $model, array $attributes = [], $resource = true){

        $resourceModel = factory("App\\Models\\$model")->create($attributes);
        $resourceClass = "App\\Http\\Resources\\$model";

        if(!$resource)
            return $resourceModel;
            
        $resourceClass::withoutWrapping();
        return json_encode(new $resourceClass($resourceModel), true);
    }
}
