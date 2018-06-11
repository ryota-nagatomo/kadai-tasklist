<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;    // add

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            
            $data += $this->counts($user);
            return view('tasks.index', [
                'tasks' => $tasks,
            ]);
        }
        
        else {
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
            'importance' => 'required|max:10',
            'due' => 'required',
        ]);
        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
            'importance' => $request->importance,
            'due' => $request->due,
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if( $task != null){
            
            $user = \Auth::user();
        
            if($user->id == $task->user_id){
                return view('tasks.show', [
                'task' => $task,
            ]);
            }
            else{
                return view('welcome');
            }
        }
        else{
            return redirect('/');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        
        if( $task != null){
            $user = \Auth::user();
            if($user->id == $task->user_id){
        
            return view('tasks.edit', [
                'task' => $task,
            ]);
            }
            else{
                return view('welcome');
            }
        }
        else{
            return redirect('/');
        }
            
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
        $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
            'importance' => 'required|max:10',
            'due' => 'required',
        ]);
        $task = Task::find($id);
        $user = \Auth::user();
        
        if($user->id == $task->user_id){
            $task->content = $request->content;
            $task->status = $request->status;
            $task->importance = $request->importance;
            $task->due = $request->due;
            $task->save();

            return redirect('/');
        }
        
         else{
            return redirect('/');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $user = \Auth::user();
        
        if($user->id == $task->user_id){
        
            $task->delete();

            return redirect('/');
        }
        else{
            return redirect('/');
        }
        
    }
}
