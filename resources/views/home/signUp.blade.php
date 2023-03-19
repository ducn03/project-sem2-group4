@extends('layout.layout')
@section('title', 'OrganicFood')
@section('content')

<div class="container">

    <form action="{{ url('home/postSignUp') }}" class="form_signUp_member" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="title_signUp_member">
            <span class="content_signUp_member">Register</span>
        </div>
        <label class="label_login_member" for=""></label><br>
        <input class="res_input_member" name="email" type="email" placeholder="Enter username" required><br>
        <label class="label_login_member" for=""></label><br>
        <input class="res_input_member" name="password" type="password" placeholder="Enter password" required><br>
        <label style="color: #3333336f; margin-left: 50px;" class="label_login_member" for="">Choose your avatar</label><br>
        <input class="input_file_member" name="picture" id="picture" placeholder="Choose your avatar" type="file"><br>
        <label class="label_login_member" for=""></label><br>
        <input class="res_input_member" name="fullname" type="text" placeholder="Enter your fullname" required><br>
        <label class="label_login_member" for=""></label><br>
        <input class="res_input_member" name="tel" type="number" minlength="8" maxlength="11" placeholder="Enter your phone number" required><br>
        <label class="label_login_member" for=""></label><br>
        <input class="res_input_member" name="address" type="text" placeholder="Enter your address" required><br>
        <label class="label_login_member" for=""></label><br>
        {{-- <select class="input_active_member" name="active">
                <option value="0">Please choose one</option>
                <option value="1">Active</option>
                <option value="2">Disable</option>
            </select> --}}
        <button class="signUp_button_member">Register</button>
        <div class="form_login_link_register">
            Do you already have an account? <a href="{{ url('home/loginMember') }}">Login here!</a>
        </div>
    </form><br>

</div>

@endsection
@section('script-section')


@endsection
