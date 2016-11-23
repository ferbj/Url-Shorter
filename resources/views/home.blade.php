@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido al acotador</div>
                @if($errors->has('url'))
                    <p>{{$errors->first('url') }}</p>
                @endif
                <div class="panel-body">
                    <h2>Url Shorter</h2>
                    <form class="form-horizontal" role="form" action="{{route('links.store') }}"  method="post">
                        {!! csrf_field() !!}
                        <div class="col-md-7">
                            <input class="form-control" name ="url" id="url" type="url" placeholder="http://www.tupagina.com" required>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-primary" value="Acotar">
                                <input type="reset" class="btn btn-info" value="Limpiar">
                            </div>        
                        </div>
                    </form>

                </div>
            </div>
            <div class="table table-responsive">
                <table class="table table-hover">
                    <th>Id</th>
                    <th>Url</th>
                    <th>Hash</th>
                    <th>Url Acotada</th>
                    <th># Visitas</th>
                    @foreach ($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->url }}</td>
                        <td>{{ $link->hash }}</td>
                        <td>{{ Html::link(url('/').'/'.$link->hash,'Visita el Link',['target'=>'_blank'])}}</td>
                        <td>{{ $link->contador }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

