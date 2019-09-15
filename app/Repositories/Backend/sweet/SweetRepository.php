<?php

namespace App\Repositories\Backend\sweet;

use DB;
use Carbon\Carbon;
use App\Models\sweet\Sweet;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SweetRepository.
 */
class SweetRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Sweet::class;

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
                config('module.sweets.table').'.id',
                config('module.sweets.table').'.name',
                config('module.sweets.table').'.created_at',
                config('module.sweets.table').'.updated_at',
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
        if (Sweet::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.sweets.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Sweet $sweet
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Sweet $sweet, array $input)
    {
    	if ($sweet->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.sweets.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Sweet $sweet
     * @throws GeneralException
     * @return bool
     */
    public function delete(Sweet $sweet)
    {
        if ($sweet->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.sweets.delete_error'));
    }
}
