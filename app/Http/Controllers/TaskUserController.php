<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class TaskUserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        //permet de valider les données qui ont été remplie par le formulaire et de les sotcket en base

        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id'
        ]);

        $taskUser = new TaskUser();
        $taskUser->user_id=$validatedData['user_id'];
        $taskUser->task_id = $task->id;
        $taskUser->save();

        return redirect()->route('tasks.show', $task);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskUser $taskUser, Task $task)
    {

        //permet de supprimer une task d'un board
        $taskUser->delete();
        return redirect()->route('tasks.show', $task);
    }
}
