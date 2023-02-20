<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <div class="col-xs-1" align="center">
    <h1>Login Data</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Last Login</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                   
                            <tr>
                           
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                
                                <!-- without called ->with('logins') -->
                                <!-- it faced n+1 issues and called 30 models -->
                                {{--<td>{{ $user->logins()->latest()->first()->created_at->diffForHumans() }}</td>--}}
                                
                                <!-- after called ->with('logins') -->
                                <!-- it removes n+1 issues but called 7515 models -->
                                {{--<td>{{ $user->logins->sortByDesc('created_at')->first()->created_at->diffForHumans() }}</td>--}}

                                <!-- for this only 2 query and 15 models called and no need ->with('logins') -->
                                <td>{{ $user->last_login_at->diffForHumans() }}
                        
                              </tr>
                     
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>