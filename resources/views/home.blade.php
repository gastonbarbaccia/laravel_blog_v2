@section('title', 'Page Title')

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dashboard_usuarios as $usuario)
                                        <tr>
                                            <th scope="row">{{ $usuario->id }}</th>
                                            <td>{{ $usuario->First }}</td>
                                            <td>{{ $usuario->Last }}</td>
                                            <td>{{ $usuario->Handle }}</td>
                                            <td>
                                                <a
                                                    href="javascript:document.getElementById('delete-{{ $usuario->id }}').submit()">Delete</a>
                                                <form id='delete-{{ $usuario->id }}'
                                                    action="{{ route('delete.user', $usuario->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                </form>

                                                <a href="{{ route('edit.user', $usuario->id) }}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

<br>
<hr>

<div class="container">
    <form method="POST" action="{{ route('save.user') }}">
        @method('POST')
        @csrf

        <div class="form-group">
            <label for="first"></label>
            <input type="text" class="form-control" id="first" name="first" placeholder="Ingrese nombre">
        </div>
        @error('first')
        <div class="alert alert-danger" role="alert">
           Por favor verifique que el campo este completo 1!
         </div>
       @enderror
        <div class="form-group">
            <label for="last"></label>
            <input type="text" class="form-control" id="last" name="last" placeholder="Ingrese apellido">
        </div>
       @error('last')
        <div class="alert alert-danger" role="alert">
           Por favor verifique que el campo este completo 2!
         </div>
       @enderror
        <div class="form-group">
            <label for="handle"></label>
            <input type="text" class="form-control" id="handle" name="handle" placeholder="Ingrese nickname">
        </div>
        @error('handle')
        <div class="alert alert-danger" role="alert">
           Por favor verifique que el campo este completo 3!
         </div>
       @enderror
        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
