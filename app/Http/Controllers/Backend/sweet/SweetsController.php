<?php

namespace App\Http\Controllers\Backend\sweet;

use App\Models\sweet\Sweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\sweet\CreateResponse;
use App\Http\Responses\Backend\sweet\EditResponse;
use App\Repositories\Backend\sweet\SweetRepository;
use App\Http\Requests\Backend\sweet\ManageSweetRequest;
use App\Http\Requests\Backend\sweet\CreateSweetRequest;
use App\Http\Requests\Backend\sweet\StoreSweetRequest;
use App\Http\Requests\Backend\sweet\EditSweetRequest;
use App\Http\Requests\Backend\sweet\UpdateSweetRequest;
use App\Http\Requests\Backend\sweet\DeleteSweetRequest;

/**
 * SweetsController
 */
class SweetsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SweetRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SweetRepository $repository;
     */
    public function __construct(SweetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\sweet\ManageSweetRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSweetRequest $request)
    {
        return new ViewResponse('backend.sweets.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSweetRequestNamespace  $request
     * @return \App\Http\Responses\Backend\sweet\CreateResponse
     */
    public function create(CreateSweetRequest $request)
    {
        return new CreateResponse('backend.sweets.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSweetRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSweetRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sweets.index'), ['flash_success' => trans('alerts.backend.sweets.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\sweet\Sweet  $sweet
     * @param  EditSweetRequestNamespace  $request
     * @return \App\Http\Responses\Backend\sweet\EditResponse
     */
    public function edit(Sweet $sweet, EditSweetRequest $request)
    {
        return new EditResponse($sweet);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSweetRequestNamespace  $request
     * @param  App\Models\sweet\Sweet  $sweet
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSweetRequest $request, Sweet $sweet)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sweet, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sweets.index'), ['flash_success' => trans('alerts.backend.sweets.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSweetRequestNamespace  $request
     * @param  App\Models\sweet\Sweet  $sweet
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sweet $sweet, DeleteSweetRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sweet);
        //returning with successfull message
        return new RedirectResponse(route('admin.sweets.index'), ['flash_success' => trans('alerts.backend.sweets.deleted')]);
    }
    
}
