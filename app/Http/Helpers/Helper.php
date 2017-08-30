<?php
// Laravel\app\Http\helpers\herpers.php file
namespace App\Http\Helpers;

use DB;
use Crypt;
use App\Code as Code;
use App\Asset as Asset;

use App\Contract as Contract;

class Helper
{

    public static function formatCurrencyOutput($cost)
    {
        if (is_numeric($cost)) {
            return number_format($cost, 2, '.', '');
        }
        // It's already been parsed.
        return $cost;
    }

    /**
     * Get the list of models in an array to make a dropdown menu
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v2.5]
     * @return Array
     */
    public static function modelList()
    {
        $models = AssetModel::with('manufacturer')->get();
        $model_array[''] = trans('general.select_model');
        foreach ($models as $model) {
            $model_array[$model->id] = $model->displayModelName();
        }
        return $model_array;
    }


    public static function companyList()
    {
        $company_list = array('0' => trans('general.select_company')) + DB::table('companies')
                ->orderBy('name', 'asc')
                ->pluck('name', 'id');
        return $company_list;
    }
	/**
     * Get the list of categories in an array to make a dropdown menu
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v2.5]
     * @return Array
     */
    public static function categoryList($category_type = null)
    {
        $categories = Category::orderBy('name', 'asc')
                ->whereNull('deleted_at')
                ->orderBy('name', 'asc');
        if(!empty($category_type))
            $categories = $categories->where('category_type', '=', $category_type);
        $category_list = array('' => trans('general.select_category')) + $categories->pluck('name', 'id')->toArray();
        return $category_list;
    }

	/**
     * 코드 리스트를 어레이로 불러와서 드롭다운 메뉴를 만든다.
     *
     * @author
     * @since
     * @return Array
     */
    public static function codeList($tableName = null, $fieldName = null)
    {
        $categories = Code::orderBy('codeValue', 'asc')
                ->whereNull('deleted_at')
                ->orderBy('code_id', 'asc');
        if(!empty($tableName))
            $categories = $categories->where('tableName', '=', $tableName)->where('fieldName' ,'=',$fieldName);
        $code_list = array('' => trans('코드선택')) + $categories->pluck('codeValue', 'id')->toArray();
        return $code_list;
    }

    public static function assetsList()
    {
        $assets_list = array('' => trans('general.select_asset')) + Asset::orderBy('name', 'asc')
                ->whereNull('deleted_at')
                ->pluck('name', 'id')->toArray();
        return $assets_list;
    }

    public static function contractList()
    {
        $contract_list = Contract::orderBy('date','desc')->get();
        return $contract_list;
    }

    public static function employeeList()
    {
        $employee_list = Employee::orderBy('')->get();
    }

<<<<<<< HEAD
=======
    public static function file_size_path($path)
    {
    $size = filesize(public_path($path));
    $units = array( 'bytes', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb', 'Eb', 'Zb', 'Yb');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }
// {{ filesize(public_path($contract->file_name))/2048 ." Mb" }}
>>>>>>> 198a5fcd102acdd33bdd06707f0fd6a40f7d400a
}