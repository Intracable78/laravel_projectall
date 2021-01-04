@extends('layouts.main')

@section('title', "Task " .  $task->title)


@section('content')
    <h2>{{$task->title}}</h2>
    <p>{{$task->description}}</p>
    <p>À finir avant le {{$task->due_date}}</p>
    <p>Status :  {{$task->state}}</p>
    <p>Utilisateurs présents dans le boards à ajouter à cette tâche : </p>
    @if(count($users) == 0)
        <b><p>Aucun utilisateur a ajouter à  cette tâche</p></b>
    @endif
    <form action="{{route('boards.taskuser.store', $task)}}" method="POST">
        @csrf
    <select name="user_id" id="user_id" value="{{$users}}">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
        <button type="submit">Ajouter</button>
    </form>
    <h3>Utilisateurs qui participent à cette tâche : </h3>
    <div class="participants">

        @foreach($task->assignedUsers as $user)
            <p>{{$user->name}} : {{$user->email}}</p>

            <form action="{{route('boards.taskuser.destroy', $user->pivot)}}" method="POST">
                @csrf
                @method("DELETE")

                <button type="submit">Supprimer</button>
            </form>
        @endforeach
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="commentaires">
        <h3>Commentaires de cette tâches :</h3>
        @foreach($comments as $comment)
            <p>{{$comment->user->name}} : {{$comment->text}}</p>
        @can('delete', $comment)
            <form action="{{route('comment/destroy', $comment->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">Supprimer</button>
            </form>
            @endcan
        @endforeach
    <h3>Ajouter un commentaire</h3>
        <form action="{{route('comment.store', [$task->id, Auth::User()->id])}}" method="POST">
            @csrf
            <input type='textarea' name='commentaire' id="commentaire" >
            <button type="submit">Ajouter</button>
        </form>
    </div>


@endsection
