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


<h1>Welcome to Dashboard </h1>
@auth
<p>User Name:{{Auth::User()->name}}</p>
<p>user Email:{{Auth::User()->email}}</p>
 {{-- {{Auth::User()}} --}}
@endauth

@if (session('message'))
<div class="alert alert-primary" role="alert">
    {{ session('message') }}
</div>
  @endif

<div>
    <form action="{{Route('userlogout')}}" method="POST">
        @csrf
        <input type="submit" name="logout"  value="Logout" class="btn btn-primary">
    </form>
    {{-- <a href="{{Route('login')}}" class="btn btn-primary">Logout</a> --}}
</div>
<br>

<a href="{{Route('add_depy')}}" class="btn btn-primary" {{Auth::User()->role == 'admin' ? '' : 'hidden' }}>Add Department</a>
<a href="{{Route('emp')}}" class="btn btn-primary" {{Auth::User()->role == 'admin' ? '' : 'hidden' }}>Add Employees</a>
<br><br>



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Department</th>
        <th scope="col">Salary</th>
        <th scope="col" {{Auth::User()->role == 'admin' ? '' : 'hidden' }}>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($emp as $item)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->Department->dept_name}}</td>
        <td>{{$item->Salary->salary}}</td>
        <td {{Auth::User()->role == 'admin' ? '' : 'hidden' }}>
            <a href="edit/{{$item->id}}" style="margin-right: 10px;" class="btn btn-danger btn-sm">Edit</a>
            {{-- <a href="delete/{{$item->id}}" style="margin-right: 10px;" class="btn btn-danger btn-sm" onclick="return confirm('are you sure')">Delete</a> --}}

            <form action="delete/{{$item->id}}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"onclick="return confirm('are you sure')">Delete</button>
            </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>

