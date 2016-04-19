@extends('layout.template')

@section('title','home')

@section('content')
    <h2 class="title-persons">Últimas personas agregadas</h2>
    <div class="row">
        <div class="col-sm-12">

            {!! Form::open([''=>'','method'=>'post', 'class'=> 'form-inline text-right filter-persons']) !!}
                <div class="form-group">
                    <select class="form-control" name="status" id="">
                        <option value="">Estado</option>
                        <option value="">Estado uno</option>
                        <option value="">Estado dos</option>
                        <option value="">Estado tres</option>
                    </select>

                </div>
                <div class="form-group">
                    <select class="form-control" name="age" id="">
                        <option value="">Edad</option>
                        <option value="">Edad uno</option>
                        <option value="">Edad dos</option>
                        <option value="">Edad tres</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="gender" id="">
                        <option value="">gender</option>
                        <option value="">Masculino</option>
                        <option value="">Femenino</option>
                    </select>
                </div>

            {!! Form::close() !!}

            <div class="container-persons">
                @foreach( $users as $user)
                    <div class="person">
                        <img class="person__photo" src="{{$user->photo}}" alt="{{$user->name}}">
                        <ul class="person__data">
                            <li>Nombre: {{$user->first_name}}</li>
                            <li>Apellido: {{$user->last_name}}</li>
                            <li>Edad: {{$user->age}}</li>
                            <li>Ciudad: {{$user->city}}</li>
                            <li>Estado:
                                @if($user->status == 'vivo')
                                    <span class="label label-success">
                                        {{$user->status}}
                                    </span>
                                @elseif($user->status == 'desaparecido')
                                    <span class="label label-warning">
                                        {{$user->status}}
                                    </span>
                                @else
                                    <span class="label label-danger">
                                    {{$user->status}}
                                </span>
                                @endif
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary person__button">
                            <i class="glyphicon glyphicon-eye-open"></i> Ver
                        </a>
                    </div>
                @endforeach

            </div>{{--FIN CONTAINER PERSON--}}

            {{--PAGINATE---}}
            {!! $users->render() !!}

        </div>{{--FIN COLUMNS--}}
    </div>{{--FIN ROW--}}
@endsection

