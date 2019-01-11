<?php

namespace App\Repositories;

use App\Entities\MenuItem;
use App\Repositories\MenuItemRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class MenuItemRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MenuItemRepositoryEloquent extends BaseRepository implements MenuItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
