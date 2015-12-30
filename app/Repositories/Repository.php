<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container;

abstract class Repository {

    protected $app;

    protected $model;

    /**
     * Repository constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * Make model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws Exception
     */
    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new Exception("Class {$this->model()} must be an instance of " . Model::class);

        return $this->model = $model->newQuery();
    }

}