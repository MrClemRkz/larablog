@extends('main')

@section('styles')
    <style type="text/css">
    /*strikethrough all h3 tags*/
    h3{
        text-decoration: line-through;
    }
    </style>
@endsection

@section('title', '| About')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <h3>About Me</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

@endsection