@extends('layout.layout')

@section('content')
    <h1>Edit User</h1>
    <hr>
     <form action="{{url('users', [$User->id])}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Name</label>
        <input type="text" value="{{$User->name}}" class="form-control" id="name"  name="name" >
      </div>
      <div class="form-group">
        <label for="title">email</label>
        <input type="text" value="{{$User->email}}" class="form-control" id="email"  name="email" >
      </div>
      <div class="form-group">
        <label for="title">phone</label>
        <input type="text" value="{{$User->phone}}" class="form-control" id="phone"  name="phone" >
      </div>
      <div class="form-group">
        <label for="title">image</label>
        <input type="text" value="{{$User->image}}" class="form-control" id="image"  name="image" >
      </div>
      
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection