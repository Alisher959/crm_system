@extends('layout')
@section('content')
<style>
    .push-top {
        margin-top: 50px;
    }
</style>

<div class="push-top">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif


    <table class="table text-center">
        <thead>
            <tr>
                <td>Umumiy berilgan</td>
                <td>Umumiy olingan</td>
                <td>Umumiy qoldi</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    {{$take}}
                </td>
                <td>
                    {{$give}}
                </td>
                <td>
                    {{$remained_all}}
                </td>
            </tr>
        </tbody>
    </table>

<a href="{{ route('students.create')}}" class="align-items-end btn btn-primary btn-sm"">Qo'shish</a>
    <table class="table mt-5">
        <thead>
            <tr class="table-warning">
                <td>ID</td>
                <td>Sana</td>
                <td>Shaxs</td>
                <td>Berilgan</td>
                <td>Olingan</td>
                <td>Qolgan</td>
                <td>Izoh</td>
                <td class="text-center">Harakatlar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($student as $students)
            <tr>
                <td>{{++$index}}</td>
                <td>{{$students->date}}</td>
                <td>{{$students->person}}</td>
                <td>{{$students->take}}</td>
                <td>{{$students->give}}</td>
                <td>{{$students->remained}}</td>
                <td>{{$students->message}}</td>
                <td class="text-center">
                    <a href="{{ url('students.edit/'.$students->id)}}" class="btn btn-primary btn-sm"">O'zgartirish</a>
                <form action=" {{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"" type=" submit">O'chirish</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        @endsection