<?php

namespace App\Http\Controllers\Backend\sweet;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\sweet\SweetRepository;
use App\Http\Requests\Backend\sweet\ManageSweetRequest;

/**
 * Class SweetsTableController.
 */
class SweetsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SweetRepository
     */
    protected $sweet;

    /**
     * contructor to initialize repository object
     * @param SweetRepository $sweet;
     */
    public function __construct(SweetRepository $sweet)
    {
        $this->sweet = $sweet;
    }

    /**
     * This method return the data of the model
     * @param ManageSweetRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSweetRequest $request)
    {
        return Datatables::of($this->sweet->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($sweet) {
                return Carbon::parse($sweet->created_at)->toDateString();
            })
            ->addColumn('actions', function ($sweet) {
                return $sweet->action_buttons;
            })
            ->make(true);
    }
}
