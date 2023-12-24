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

    <div class="divclass fontSizeClass">Employess</div>
    <div class="divclass">

        <form action="{{Route('saveemp')}}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                {{ $message }}
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="">
                @error('phone')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="salary">Salary</label>
                <input type="number" name="sal" >
            </div>
            <div>
                <label for="deptment">Department</label>
                <select class="divclass" name="department_name">
                    <option selected>Select Department</option>
                    @foreach ($options as $department )
                    <option value="{{$department->id}}">{{$department->dept_name}}</option>
                    @endForeach
                  </select>
            </div>


            <div>
                <input type="submit" value="Save" class="btn btn-primary">
            </div>

        </form>
    </div>

</body>
</html>
