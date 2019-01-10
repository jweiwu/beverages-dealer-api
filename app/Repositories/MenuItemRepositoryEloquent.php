<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MenuItemRepository;
use App\Entities\MenuItem;
use App\Validators\MenuItemValidator;

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
