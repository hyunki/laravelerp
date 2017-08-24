<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Asset as Asset;
use App\Http\Helpers\Helper as Helper;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data['assets'] = Helper::assetsList();
        return view('asset.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $model_list = Helper::modelList();
        // $statuslabel_list = Helper::statusLabelList();
        // $location_list = Helper::locationsList();
        // $manufacturer_list = Helper::manufacturerList();
        // $category_list = Helper::categoryList('asset');
        // $supplier_list = Helper::suppliersList();
        // $company_list = Helper::companyList();
        // $assigned_to = Helper::usersList();
        // $statuslabel_types = Helper::statusTypeList();

        $view = View::make('asset.edit');
        // $view->with('supplier_list', $supplier_list);
        // $view->with('company_list', $company_list);
        // $view->with('model_list', $model_list);
        // $view->with('statuslabel_list', $statuslabel_list);
        // $view->with('assigned_to', $assigned_to);
        // $view->with('location_list', $location_list);
        // $view->with('item', new Asset);
        // $view->with('manufacturer', $manufacturer_list);
        // $view->with('category', $category_list);
        // $view->with('statuslabel_types', $statuslabel_types);
        // if (!is_null($model_id)) {
        //     $selected_model = AssetModel::find($model_id);
        //     $view->with('selected_model', $selected_model);
        // }

        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back()->withInput()->withErrors($assetMaintenance->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view::make('asset/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}