<?php

namespace App\Http\Controllers\Backend\home;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\home\HomeRepository;
use App\Http\Requests\Backend\home\ManageHomeRequest;

/**
 * Class HomesTableController.
 */
class HomesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var HomeRepository
     */
    protected $home;

    /**
     * contructor to initialize repository object
     * @param HomeRepository $home;
     */
    public function __construct(HomeRepository $home)
    {
        $this->home = $home;
    }

    /**
     * This method return the data of the model
     * @param ManageHomeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageHomeRequest $request)
    {
        return Datatables::of($this->home->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($home) {
                return Carbon::parse($home->created_at)->toDateString();
            })
            ->addColumn('actions', function ($home) {
                return $home->action_buttons;
            })
            ->make(true);
    }
}
