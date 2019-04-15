<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class ToDoList extends Model
{
	protected $table = 'to_do_lists';
	
	protected $fillable = ['title', 'content', 'attachment'];
	
	public $timestamps = false;
	
	public function allLists(){

		return self::all();
	}
	
	public function getList($id){
		
	  $list = self::find($id);
	  if(is_null($list)){
		  return false;
	  }
	  return $list;
		
	}

	public function saveList(){
	
	  $input = Input::all();
	  if(!isset($input['title']) || !isset($input['content']) || !isset($input['attachment'])){
		return false;
	  }

	  $toDoList = New ToDoList();
	
	  $toDoList->fill($input);
	  $toDoList->save();
	  return $toDoList;
	
	}
	
	public function updateList($id){
		
	  $list = self::find($id);
	  if(is_null($list)){
		  return false;
	  }
	  $input = Input::all();
	  if(!isset($input['title']) || !isset($input['content']) || !isset($input['attachment'])){
		return false;
	  }
	  
	  $list->fill($input);
	  $list->save();
	  return $list;
		
	}
	
	public function delList($id){
		
	  $list = self::find($id);
	  if(is_null($list)){
		  return false;
	  }
	  return $list->delete();
		
	}
	
	public function delAllList(){
		
	  //回傳筆數
	  return self::whereNotNull('id')->delete();
		
	}
	
}
