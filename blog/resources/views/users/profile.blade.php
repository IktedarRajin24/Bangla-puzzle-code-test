
@extends('include.layout')
        @section('content')
        <br>
        <br>
        <br>
            <h1 style="background-color: skyblue; text-align: center">{{$users->Name}}'s Profile</h1>
            <table class="table table-border" style="text-align: center">
                <tr hidden>
                    <td>ID:</td>
                    <td>{{$users->id}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$users->Name}}</td>
                </tr>

                <tr>
                    <td>E-mail</td>
                    <td>{{$users->Email}}</td>
                </tr>

                <tr>
                    <td>Edit Info</td>
                    <td><a class="btn btn-success" href="/userEdit/{{$users->id}}/{{$users->Name}}">Edit</a></td>
                </tr>

                <tr>
                    <td>You want to delete your profile?</td>
                    <td><a class="btn btn-danger" href="/userDelete/{{$users->id}}">Delete Account</a></td>
                </tr>
                    
                <tr>
                    <td></td>
                    <td><a class="btn btn-danger" href="{{route('users.dashboard')}}">Back</a></td>
                </tr>

                

            </table>

            
            
        @endsection



