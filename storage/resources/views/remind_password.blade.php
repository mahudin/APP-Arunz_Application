@extends('index')
@section('content')

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3 col-g-3" ></div><!--idu_rp-->
            <div class="col-xs-6 col-md-6 col-sm-6 col-lg-6 col-g-6" ></div>
                <h3>Podaj swoje nowe hasło</h3>
                <form action="/update_profile_data_reminder" id="zmien_haslo" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id="error_pass"></div>
                    <input type="text" id="haslo" name="haslo" class="form-control"/>
                    <input type="hidden" name="idu" value="{{$idu_rp}}"/>
                    <input type="button" id="wyslij" class="form-control" value="Wyślij" />
                </form>

            </div>
            <div class="col-xs-3 col-md-3 col-sm-3 col-lg-3 col-g-3" ></div>
        </div>

@endsection