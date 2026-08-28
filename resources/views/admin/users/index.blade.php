@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Gestion des utilisateurs</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('users.create') }}"> Ajouter</a>
    </div>
  </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Admin</th>
    <th width="280px">Action</th>
  </tr>
  @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->is_admin }}</td>
    <td>
      <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Modifier</a>
      @if(Auth::user()->id != $user->id)
      <a class="btn btn-danger" href="{{ route('users.show',$user->id) }}">Supprimer</a>
      @endif
    </td>
  </tr>
  @endforeach
</table>


{!! $data->render() !!}



@endsection