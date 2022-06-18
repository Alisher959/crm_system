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
        Qarzni o'zgartirish
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
        <form method="put" action="{{ route('students.update', $student->id) }}">
            <div class="form-group">
                @csrf
                @method("PUT")
                <label for="date">Sana</label>
                <input type="date" class="form-control" value="{{ $student->date }}" name="date" />
            </div>
            <div class="form-group">
                @csrf
                <label for="date">Shaxs</label>
                <input type="text" class="form-control" value="{{ $student->person }}" name="person" />
            </div>
            <div class="form-group">
                @csrf
                <label for="take">Olingan</label>
                <input type="text" class="form-control" value="{{ $student->take }}" name="take" />
            </div>
            <div class="form-group">
                <label for="give">Berilgan</label>
                <input type="text" class="form-control" value="{{ $student->give }}" name="give" />
            </div>
            <div class="form-group">
                <label for="message">Izoh</label>
                <input type="text" class="form-control" value="{{ $student->message }}" name="message" />
            </div>
            <button type="submit" class="btn btn-block btn-success">O'zgartirish</button>
        </form>
    </div>
</div>
@endsection