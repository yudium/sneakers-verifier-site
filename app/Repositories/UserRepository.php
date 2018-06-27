<?php

namespace App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return 'App\User';
    }

    /**
     * @param string|array $params
     */
    public function withCount($params)
    {
        $this->model = $this->model->withCount($params);
        return $this;
    }
}

