<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ToDo;
use App\Http\Resources\ToDo as ToDoResource;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get list of Todo's for user
        $todos = ToDo::all();

        //Return collection of todo's as a resource
        return ToDoResource::collection($todos);
    }
    /**
     * Store a newly created resource in storage.
     * Store will take care of creating new todo's and updating existing todos
     * If todo not found in db, create an empty todo and fill it with input from app
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = $request->isMethod('put') ? ToDo::findOrFail($request->todo_id) : new ToDo;

        $todo->id = $request->input('todo_id');
        $todo->name = $request->input('name');
        $todo->completed = $request->input('completed');
        $todo->user_id = auth()->user()->email;
        $todo->deleted = $request->input('deleted');

        if($todo->save()) {
            return [
               'error' => "",
               'message' => "Saved successfully",
               'status' => 200
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // Get single todo
         $todo = ToDo::findOrFail($id);

         // Return single todo as a resource
         return new ToDoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get todo
        $currentToDo = ToDo::findOrFail($id);

        if($currentToDo->delete()) {
            return new ToDoResource($currentToDo);
        }    
    }
}
