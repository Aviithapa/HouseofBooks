<?php


namespace App\Http\Controllers\Admin\WebSite;


use App\Modules\Backend\Website\Category\Repositories\CategoryRepository;
use App\Modules\Backend\Website\Faculty\Repositories\FacultyRepository;
use App\Modules\Backend\Website\Help\Repositories\HelpRepository;
use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use App\Modules\Backend\Website\Semester\Repositories\SemesterRepository;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class HelpController extends BaseController
{
    private $helpRepository;
    private $productRepository, $log ,$facultyRepository, $semesterRepository, $categoryRepository, $postRepository;
    private $viewData;

    /**
     * UserController constructor.
     * @param HelpRepository $helpRepository
     * @param Log $log
     * @param ProductRepository $productRepository
     * @param FacultyRepository $facultyRepository
     * @param SemesterRepository $semesterRepository
     * @param PostRepository $postRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(HelpRepository $helpRepository,Log $log, ProductRepository $productRepository ,
                                FacultyRepository $facultyRepository,
                                SemesterRepository $semesterRepository,
                                PostRepository $postRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->helpRepository = $helpRepository;
        $this->productRepository = $productRepository;
        $this->facultyRepository = $facultyRepository;
        $this->semesterRepository = $semesterRepository;
        $this->categoryRepository=$categoryRepository;
        $this->postRepository=$postRepository;
        $this->log = $log;
    }

    public function index()
    {
        $this->authorize('read', $this->productRepository->getModel());
            $product = $this->productRepository->getAll()->where('category','=','second-hand');
            if (\request()->ajax()) {
                return DataTables::of($product)
                    ->addColumn('action', function ($products) {
                        $data = $products;
                        $name = 'dashboard.product';
                        $view = false;
                        return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                    })
                    ->editColumn('product_image', function ($product) {
                        $url = asset($product->getImage());
                        return '<img src=' . $url . ' border="0" width="40"  />';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->rawColumns(['product_image', 'action'])
                    ->make(true);

            }
            return $this->view('web-site.help.index', $this->viewData);
        }

}
