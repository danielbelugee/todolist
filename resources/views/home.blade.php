<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-do List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-dark btn-sm px-4" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                {{-- if tasks count --}}
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todolists as $todolist)
                      <li class="list-group-item">
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                               {{ $todolist->Content }} 
                               @csrf
                               @method('delete')
                              <button type="submit" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>

                            </form>
                      </li>
                       @endforeach
                </ul>
                @else
                <p class="text-center mt-3">No Task!</p>
                @endif
              </div> 
              @if (count($todolists))
                  <div class="card-footer">
                      You have {{ count($todolists) }} pending Task 

                  </div>

              @else

              @endif
        </div> 
    </div>
    <script src="https://kit.fontawesome.com/5c2cdc54e3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>