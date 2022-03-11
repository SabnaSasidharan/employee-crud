<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employeemodel;

class Employeecontroller extends Controller
{
    public function index(){
     //   return view("employeeview");
        return view("view");
    }
    public function add(){
        return view("employee");
    }
    public function insert(Request $request){
        $employee = new Employeemodel();

        $employee->name = $request->input('ename');
        $employee->email = $request->input('eemail');        
        $employee->designations = $request->input('edesignation');

        if($request->hasfile('ephoto')){
            $file = $request->file('ephoto');
            $extension = $file->getClientOriginalExtension(); //get image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/',$filename);  //upload image to folder uploads
            $employee->photo = $filename;
        }
        
        $employee->save();
        return redirect('/employee')->with('message', $employee->email.' has inserted successfully !!'); //redirect to view page       
    }
    public function edit($id){
         $data = Employeemodel::find($id);
         return view('employeeedit',['data'=>$data]);
        
    }
    public function update(Request $req){
        $employee = Employeemodel::find($req->input('eid'));

        $employee->name = $req->input('ename');
        $employee->email = $req->input('eemail');        
        $employee->designations = $req->input('edesignation');
        if($req->hasfile('ephoto')){
            $file = $req->file('ephoto');
            $extension = $file->getClientOriginalExtension(); //get image extension
            $filename = time().'.'.$extension;
            $file->move('uploads/employee/',$filename);  //upload image to folder uploads
            $employee->photo = $filename;
        }
        $employee->save();
        return redirect('/employee');

    }
    public function delete($id){
        $post = Employeemodel::where('id',$id)->first();

        if ($post != null) {
            $post->delete();            
        }
        return redirect('/employee');       
    }
   
    public function getEmployees(Request $request){
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        //var_dump($rowperpage);
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Employeemodel::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Employeemodel::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Employeemodel::orderBy($columnName,$columnSortOrder)
               ->where('employeemodels.name', 'like', '%' .$searchValue . '%')
              ->select('employeemodels.*')
              ->skip($start)
              ->take($rowperpage)
              ->get();

        $data_arr = array();

        foreach($records as $record){
           $id = $record->id;
           $name = $record->name;
           $email = $record->email;
           $photo = "<img src='uploads/employee/$record->photo' height='50px' width='50px'></td>";          
           $designation = $record->designations;

           $updateButton = "<a href='edit/$record->id' class='btn btn-info btn-sm'>Update</a> ";           
           $deleteButton = "<a href='delete/$record->id' class='btn btn-primary btn-sm'>Delete</a>";
            
           $action = $updateButton." ".$deleteButton;
           

           $data_arr[] = array(
               "id" => $id,
               "photo" => $photo,
               "name" => $name,
               "email" => $email,
               "designation" => $designation,
               "actions" => $action
           );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        return response()->json($response); 
     }
    
}
