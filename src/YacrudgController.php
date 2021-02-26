<?php

namespace Swtysweater\Yacrudg;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Cruds;


class YacrudgController extends Controller
{
    public function getTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
    }
    public function getTableNames(){
        $tablenames = Cruds::all()->toArray();
        return $tablenames;
    }
    public function index(){
        $tablenames = $this->getTableNames();
        return view('yacrudg::app', compact('tablenames'));
    }
    public function info($controller){
        $tablenames = $this->getTableNames();
        $convertedName = Str::studly(Str::singular($controller));
        $response = app('App\Http\Controllers\\'.$convertedName.'Controller')->index();
        $columns = $this->getTableColumns('cars');
        return view('yacrudg::table', compact('tablenames', 'response', 'controller', 'columns'));
    }
    public function destroyData($controller ,$id)
    {
        $convertedName = Str::studly(Str::singular($controller));
        app('App\Http\Controllers\\'.$convertedName.'Controller')->destroy($id);
        return redirect(route('yacrudgTable', ['controller' => $controller]));
    }
    public function updateData($controller, $id)
    {
        $tablenames = $this->getTableNames();
        $convertedName = Str::studly(Str::singular($controller));
        $response = app('App\Http\Controllers\\'.$convertedName.'Controller')->show($request, $id);
        return view('yacrudg::update', compact('tablenames', 'controller', 'id', 'response'));
    }
    public function updateSubmitData(Request $request, $controller, $id)
    {
        $convertedName = Str::studly(Str::singular($controller));
        $info = app('App\Http\Controllers\\'.$convertedName.'Controller')->update($request, $id);
        return redirect(route('yacrudgTable', ['controller' => $controller]));
    }
    public function createCRUD()
    {
        $tablenames = $this->getTableNames();
        foreach($tablenames as $table){
            $occupied[] = $table['tablename'];
        }
        $allTablenames = DB::select('SHOW TABLES');
        return view('yacrudg::new', compact('tablenames', 'allTablenames', 'occupied'));
    }
    public function createCRUDSubmit(Request $request)
    {
        Artisan::call('yacrudg:create', ['name' => Str::studly(Str::singular($request->table))]);
        return redirect(route('yacrudgTable', ['controller' => $request->table]));
    }
    public function createRow($controller)
    {
        $tablenames = $this->getTableNames();
        $columns = $this->getTableColumns($controller);
        return view('yacrudg::newrow', compact('tablenames', 'columns', 'controller'));
    }
    public function createRowSubmit(Request $request, $controller)
    {
        $convertedName = Str::studly(Str::singular($controller));
        $newrow = app('App\Http\Controllers\\'.$convertedName.'Controller')->store($request);
        return redirect(route('yacrudgTable', ['controller' => $controller]));
    }
    public function removeCRUD($controller)
    {
        Artisan::call('yacrudg:remove', ['name' => Str::studly(Str::singular($controller))]);
        $tablenames = $this->getTableNames();
        return view('yacrudg::app', compact('tablenames'));
    }
}
