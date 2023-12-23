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


    <div class="divclass fontSizeClass">Login Form</div>
    <div class="divclass">
        <form action="{{route('login')}}" method="POST">
            @csrf

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                {{ $message }}
                @enderror
            </div>

            <div>
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
            <div>
                <a href="{{Route('index')}}"> You Have New a User</a>
            </div>
        </form>
    </div>

</body>
</html>
