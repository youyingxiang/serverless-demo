<?php

namespace App\Admin\Repositories;

use App\Models\ArticleModel as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Article extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
