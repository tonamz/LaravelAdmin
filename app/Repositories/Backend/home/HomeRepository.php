<?php

namespace App\Repositories\Backend\home;

use DB;
use Carbon\Carbon;
use App\Models\home\Home;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HomeRepository.
 */
class HomeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Home::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.homes.table').'.id',
                config('module.homes.table').'.name',
                config('module.homes.table').'.created_at',
                config('module.homes.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Home::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.homes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Home $home
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Home $home, array $input)
    {
    	if ($home->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.homes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Home $home
     * @throws GeneralException
     * @return bool
     */
    public function delete(Home $home)
    {
        if ($home->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.homes.delete_error'));
    }
}
