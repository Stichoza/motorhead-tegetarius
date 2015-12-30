<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

abstract class Repository {

    protected $model;

    protected $modelName;

    /**
     * Repository constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Make model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws Exception
     */
    public function makeModel() {
        $model = new $this->modelName;

        if (!$model instanceof Model)
            throw new Exception("Class {$this->modelName} must be an instance of " . Model::class);

        return $this->model = $model;
    }

}