@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Qarz qo'shish
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="date">Sana</label>
              <input type="date" class="form-control" name="date"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="date">Shaxs</label>
              <input type="text" class="form-control" name="person"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="take">Olingan</label>
              <input type="text" class="form-control" name="take"/>
          </div>
          <div class="form-group">
              <label for="give">Berilgan</label>
              <input type="text" class="form-control" name="give"/>
          </div>
          <div class="form-group">
              <label for="message">Izoh</label>
              <input type="text" class="form-control" name="message"/>
          </div>          
          <button type="submit" class="btn btn-block btn-success">Qo'shish</button>
      </form>
  </div>
</div>
@endsection 