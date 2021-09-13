<?php


namespace App\Http\Controllers\Admin\WebSite;


use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Coupons\Repositories\CouponsRepository;
use App\Modules\Backend\Website\Coupons\Requests\CreateCouponsRequest;
use App\Modules\Backend\Website\Coupons\Requests\UpdateCouponsRequest;
use Illuminate\Contracts\Logging\Log;
use Yajra\DataTables\Facades\DataTables;

class CouponsController extends BaseController
{
    private  $log, $couponsRepository;
    public function __construct(Log $log, CouponsRepository $couponsRepository)
    {
        $this->couponsRepository = $couponsRepository;
        $this->log = $log;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read', $this->couponsRepository->getModel());
        if(\request()->ajax()) {
            $blog = $this->couponsRepository->getAll();
            return DataTables::of($blog)
                ->editColumn('action', function ($blog) {
                    $data = $blog;
                    $name = 'dashboard.coupons';
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'));
                })
                ->editColumn('id', 'ID: {{$id}}')
//                    ->rawColumns(['banner_image'])
                ->rawColumns(['blogger_pic', 'action'])
                ->make(true);

        }
        return $this->view('web-site.coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $this->couponsRepository->getModel());
        return $this->view('web-site.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponsRequest $createCouponsRequest)
    {
        $this->authorize('create', $this->couponsRepository->getModel());
        $data = $createCouponsRequest->all();
        try {
            $coupons = $this->couponsRepository->create($data);
            if($coupons == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Coupons created successfully Ready to Use');
            return redirect()->route('dashboard.coupons.index');
        }
        catch (\Exception $e) {
            $this->log->error('Coupons create : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', $this->couponsRepository->getModel());
        $news = $this->couponsRepository->findById($id);
        $product = $this->couponsRepository->getAll();
        return $this->view('web-site.coupons.edit', compact('news','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponsRequest $updateCouponsRequest, $id)
    {
        $this->authorize('update', $this->blogRepository->getModel());
        $data = $updateCouponsRequest->all();
        try {
            $news = $this->couponsRepository->update($data, $id);
            if($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Coupons updated successfully');
            return redirect()->route('dashboard.coupons.index');
        }
        catch (\Exception $e) {
            $this->log->error('Coupons update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->couponsRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->couponsRepository->hardDelete($id);
            else
                $this->couponsRepository->delete($id);
            session()->flash('success', 'Coupons deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Coupons delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
}
