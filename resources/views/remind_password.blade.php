@extends('index')
@section('content')

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-2 col-md-4 col-sm-3 col-lg-4 col-g-4" ></div><!--idu_rp-->
            <div class="col-xs-8 col-md-4 col-sm-6 col-lg-4 col-g-4" >
                <h3>Podaj swoje nowe hasło</h3><br/>
                <form action="/update_profile_data_reminder" id="zmien_haslo" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id="error_pass"></div>
                    <input type="text" id="haslo" name="haslo" class="form-control"/>
                    <input type="hidden" name="idu" value="{{$idu_rp}}"/>
                    <div id="haslo_stan">
                        <input type="button" class="form-control" style="width:100px;!important;display:inline-block" id="generuj_haslo" value="Generuj"/>
                        <div id="jakosc_hasla" style="display:inline-block"></div>
                        <img id="oko" src="/materials/oko.png"/>
                        <input type="button" id="widocznosc_haslo" style="width:100px;!important;display:inline-block" class="form-control" value="Pokaż"/>
                    </div><br/><br/>
                    <input type="button" id="wyslij" class="form-control" value="Wyślij" />
                </form>
            </div>
            <div class="col-xs-2 col-md-4 col-sm-3 col-lg-4 col-g-4" ></div>
        </div>
    </div>

@endsection