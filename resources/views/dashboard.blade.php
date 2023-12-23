<!DOCTYPE html>
<style>
    .divclass {
        display: flex;
        justify-content: center;
    }
    .fontSizeClass {
        font-size: xx-large;
    }
    form > div {
        display: flex;
        margin-top: 10px;
    }
    form > div > label {
        margin-right: 10px;
        width: 300px;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<h1>Wellcome to Dashboard </h1>
@auth
<p>User Name:{{Auth::User()->name}}</p>
<p>user Email:{{Auth::User()->email}}</p>
 {{-- {{Auth::User()}} --}}
@endauth


<div>
    <form action="{{Route('userlogout')}}" method="POST">
        @csrf
        <input type="submit" name="logout"  value="Logout" class="btn btn-primary">
    </form>
    {{-- <a href="{{Route('login')}}" class="btn btn-primary">Logout</a> --}}
</div>


</body>
</html>
