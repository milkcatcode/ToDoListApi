<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;
use \Response;

class ToDoListController extends Controller
{
    protected $toDoList = null;
	
	public function __construct(ToDoList $toDoList){
		$this->toDoList = $toDoList;
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allLists()
    {
      $allLists = $this->toDoList->allLists();
		
	  if(!$allLists){
	    return Response::json(['status'=>'fail', 'message' => 'get data fail'], 400);
	  }
	  return Response::json(['status'=>'success', 'message' => $allLists, 200]);
	  
    }
	
	/**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList($id)
    {
	  $getList = $this->toDoList->getList($id);
	  
	  if(!$getList){
		return Response::json(['status'=>'fail', 'message' => 'no match data'], 400);
	  }
	  return Response::json(['status'=>'success', 'message' => $getList, 200]);

    }
	
    /**
     * Creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    	
	public function saveList(){

	  $saveList = $this->toDoList->saveList();
		
	  if(!$saveList){
        return Response::json(['status'=>'fail', 'message' => 'data save fail'], 400);
	  }
	  return Response::json(['status'=>'success', 'message' => $saveList, 200]);
	  
	}
		
	/**
     * Eediting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateList($id)
    {
	  $updateList = $this->toDoList->updateList($id);
	  
	  if(!$updateList){
		  return Response::json(['status'=>'fail', 'message' => 'data update fail'], 400);
	  }
	  return Response::json(['status'=>'success', 'message' => $updateList, 200]);

    }
	
    /**
     * Remove the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delList(Request $request, $id)
    {
	  $delList = $this->toDoList->delList($id);
	  
	  if(!$delList){
		return Response::json(['status'=>'fail', 'message' => 'no match data'], 400);
	  }
	  return Response::json(['status'=>'success', 'message' => $delList, 200]);
	  
    }
	
	/**
     * Remove the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delAllLists()
    {
	  $delAllLists = $this->toDoList->delAllList();
	  
	  if(!$delAllLists){
		return Response::json(['status'=>'fail', 'message' => 'delete data fail'], 400);
	  }
	  return Response::json(['status'=>'success', 'message' => $delAllLists, 200]);

    }
}
