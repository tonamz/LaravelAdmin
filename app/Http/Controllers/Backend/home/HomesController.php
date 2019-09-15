<?php

namespace App\Http\Controllers\Backend\home;

use App\Models\home\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\home\CreateResponse;
use App\Http\Responses\Backend\home\EditResponse;
use App\Repositories\Backend\home\HomeRepository;
use App\Http\Requests\Backend\home\ManageHomeRequest;
use App\Http\Requests\Backend\home\CreateHomeRequest;
use App\Http\Requests\Backend\home\StoreHomeRequest;
use App\Http\Requests\Backend\home\EditHomeRequest;
use App\Http\Requests\Backend\home\UpdateHomeRequest;
use App\Http\Requests\Backend\home\DeleteHomeRequest;

/**
 * HomesController
 */
class HomesController extends Controller
{
    /**
     * variable to store the repository object
     * @var HomeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param HomeRepository $repository;
     */
    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\home\ManageHomeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageHomeRequest $request)
    {
        return new ViewResponse('backend.homes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateHomeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\home\CreateResponse
     */
    public function create(CreateHomeRequest $request)
    {
        return new CreateResponse('backend.homes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreHomeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreHomeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.homes.index'), ['flash_success' => trans('alerts.backend.homes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\home\Home  $home
     * @param  EditHomeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\home\EditResponse
     */
    public function edit(Home $home, EditHomeRequest $request)
    {
        return new EditResponse($home);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateHomeRequestNamespace  $request
     * @param  App\Models\home\Home  $home
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $home, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.homes.index'), ['flash_success' => trans('alerts.backend.homes.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteHomeRequestNamespace  $request
     * @param  App\Models\home\Home  $home
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Home $home, DeleteHomeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($home);
        //returning with successfull message
        return new RedirectResponse(route('admin.homes.index'), ['flash_success' => trans('alerts.backend.homes.deleted')]);
    }
    
}
