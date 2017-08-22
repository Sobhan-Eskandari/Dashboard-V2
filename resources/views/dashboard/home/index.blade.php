@extends('layouts.main')

@section('breadcrumb')
    @component('components.Breadcrumb')

    @endcomponent
@endsection

@section('content')

    <section class="usersSection">
        <div class="grid">
            {{--==========[ Stats Progress Part One Left ]=========--}}
            <div class="col-12 col-md-3 col-lg-6 col-xl-3 grid-item" id="firstCols">
                <div class="homeCard">
                    <div class="container-fluid">
                        {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                        <div class="row horizentalStat">
                            <div class="col-7 horizentalStat_stat px-0" id="stat1Container">
                                <h5>ثبت نام ها</h5>
                                <br>
                            </div>
                            <div class="col-5 horizentalStat_circular">
                                <div id="stat1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--==========[ Stats Progress Part Second Left ]=========--}}
            <div class="col-12 col-md-3 col-lg-6 col-xl-3 grid-item">
                <div class="homeCard">
                    <div class="homeCard">
                        <div class="container-fluid">
                            {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                            <div class="row horizentalStat">
                                <div class="col-7 horizentalStat_stat px-0" id="stat2Container">
                                    <h5>بازدید سالانه</h5>
                                    <br>
                                </div>
                                <div class="col-5 horizentalStat_circular">
                                    <div id="stat2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--==========[ Stats Progress Part Third Left ]=========--}}
            <div class="col-12 col-md-3 col-lg-6 col-xl-3 grid-item">
                <div class="homeCard">
                    <div class="homeCard">
                        <div class="container-fluid">
                            {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                            <div class="row horizentalStat">
                                <div class="col-7 horizentalStat_stat px-0" id="stat3Container">
                                    <h5>بازدید ماهانه</h5>
                                    <br>
                                </div>
                                <div class="col-5 horizentalStat_circular">
                                    <div id="stat3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--==========[ Stats Progress Part Fourth Left ]=========--}}
            <div class="col-12 col-md-3 col-lg-6 col-xl-3 grid-item">
                <div class="homeCard">
                    <div class="homeCard">
                        <div class="container-fluid">
                            {{--==========[ Horizental Stat Contains two parts of circular and text ]=========--}}
                            <div class="row horizentalStat">
                                <div class="col-7 horizentalStat_stat px-0" id="stat4Container">
                                    <h5>بازدید هفتگی</h5>
                                    <br>
                                </div>
                                <div class="col-5 horizentalStat_circular">
                                    <div id="stat4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--==========[ Calender Widget in Home Page ]=========--}}
            <div class="col-12 col-md-3 col-lg-6 col-xl-3 grid-item mt-4">
                <div class="homeCard">
                    <div id="fullCalender" class="col-xs-12 no-padding-side"></div>
                </div>
            </div>

            {{--==========[ Clock Widget in Home Page ]=========--}}
            <div class="col-12 col-md-3 col-lg-6 col-xl-3 grid-item mt-4">
                <div class="homeCard clockCard">
                    <div class="fill">
                        <div class="clock
                             hour-style-pill
                             hour-text-style-large
                             hour-display-style-all
                             minute-style-line
                             minute-display-style-fine-2
                             minute-text-style-outside
                             hand-style-hollow" id="utility-clock">

                            <div class="centre">
                                <div class="dynamic"></div>
                                <div class="expand round circle-1"></div>
                                <div class="anchor hour">
                                    <div class="element thin-hand"></div>
                                    <div class="element fat-hand"></div>
                                </div>
                                <div class="anchor minute">
                                    <div class="element thin-hand"></div>
                                    <div class="element fat-hand minute-hand"></div>
                                </div>
                                <div class="anchor second">
                                    <div class="element second-hand second-hand-front"></div>
                                    <div class="element second-hand second-hand-back"></div>
                                </div>
                                <div class="expand round circle-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--==========[ Chat js Widget in Home Page ]=========--}}
            <div class="col-12 col-md-6 col-lg-12 col-xl-6 grid-item mt-4" style="height: 519px">
                <div class="homeCard">
                    <div class="carousel pt-2" data-flickity>
                        <div class="carousel-cell">
                            <p class="text-right px-5 pt-2 mb-0">آمار فروش ماهیانه</p>
                            <canvas id="doughnutChart"></canvas>
                        </div>
                        <div class="carousel-cell">
                            <p class="text-right px-5 pt-2 mb-0">آمار فروش هفلگی</p>
                            <canvas id="polarChart"></canvas>
                        </div>
                        <div class="carousel-cell">
                            <p class="text-right px-5 pt-2 mb-02">آمار درخواست ها</p>
                            <canvas id="pieChart"></canvas>
                        </div>
                        <div class="carousel-cell">
                            <p class="text-right px-5 pt-2 mb-0">آمار لغوها</p>
                            <canvas id="radarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{--==========[ Weather Widget in Home Page ]=========--}}
            <div class="col-12 col-md-6 col-lg-12 col-xl-6 grid-item mt-4">
                <div class="homeCard">
                    <div class="widget-block weather-widget">
                        <!-- MAIN AREA -->
                        <div class="img-area">
                            <div class="img-area-mask"></div>
                            <img src="{{asset('images/paris-sm.jpg')}}" alt="">
                            <div class="img-area-front">
                                <h5 class="location">رشت</h5>
                                <div class="weather-desc">
                                    <span>Cloudy, rain</span>
                                </div>
                                <ul class="weather-block-info">
                                    <li>
                                        <p class="temperature" id="weather">25<span class="temperature-feels"></span></p>
                                    </li>
                                    <li>
                                        <!-- MAIN ANIMATED SVG WEATHER ICON -->
                                        <svg
                                                version="1.1"
                                                id="cloudRainSun"
                                                class="climacon climacon_cloudRainSun"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                x="0px"
                                                y="0px"
                                                viewBox="15 15 70 70"
                                                enable-background="new 15 15 70 70"
                                                xml:space="preserve">
                             <clipPath id="cloudFillClip">
                                 <path d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z"/>
                             </clipPath>
                                            <clipPath id="sunCloudFillClip">
                                                <path
                                                        d="M15,15v70h70V15H15z M57.945,49.641c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C65.943,46.059,62.362,49.641,57.945,49.641z"/>
                                            </clipPath>
                                            <clipPath id="cloudSunFillClip">
                                                <path
                                                        d="M15,15v70h20.947V63.481c-4.778-2.767-8-7.922-8-13.84c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,5.262-3.394,9.723-8.107,11.341V85H85V15H15z"/>
                                            </clipPath>
                                            <g class="climacon_iconWrap climacon_iconWrap-cloudRainSun">
                                                <g clip-path="url(#cloudSunFillClip)">
                                                    <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                                        <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z"/>
                                                            <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                    d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z"/>
                                                        </g>
                                                        <g class="climacon_componentWrap climacon_componentWrap-sunBody" clip-path="url(#sunCloudFillClip)">
                                                            <circle
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody"
                                                                    cx="58.033"
                                                                    cy="41.612"
                                                                    r="11.999"/>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g class="climacon_componentWrap climacon_componentWrap-rain">
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left"
                                                            d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"/>
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle"
                                                            d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"/>
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right"
                                                            d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"/>
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left"
                                                            d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"/>
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle"
                                                            d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"/>
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right"
                                                            d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"/>
                                                </g>
                                                <g class="climacon_componentWrap climacon_componentWrap-cloud">
                                                    <path
                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_cloud"
                                                            d="M63.943,64.941v-4.381c2.389-1.384,4-3.961,4-6.92c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.48-4.334,1.291c-1.23-5.317-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.998c0,3.549,1.551,6.728,4,8.924v4.916c-4.777-2.768-8-7.922-8-13.84c0-8.835,7.163-15.997,15.998-15.997c6.004,0,11.229,3.311,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.372,11.998,12C71.941,58.863,68.602,63.293,63.943,64.941z"/>
                                                </g>
                                            </g>
                          </svg>
                                        <!-- /MAIN ANIMATED SVG WEATHER ICON -->
                                    </li>
                                    <li>
                                        <ul class="weather-params">
                                            <li><i class="climacon thermometer medium-high"></i> <span id="pressure">در حال دریافت</span></li>
                                            <li><i class="climacon moon full"></i> <span id="humidity">در حال دریافت</span></li>
                                            <li><i class="climacon wind"></i> <span id="wind">در حال دریافت</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="gridOfNotif mt-4">
            {{--==========[ To-Do Widget ]=========--}}
            <div class="col-12 col-md-4 grid-notif TodoWidget" id="gridWith">
                <div class="homeCard">
                    <div class="Card-Box Card-Box_dayMode hi-shadow-1">
                        {{--==========[ Header Of Card ]=========--}}
                        <div class="container-fluid">
                            <div class="row deep-purple lighten-1 Card_Header">
                                <div class="col-md-12">
                                    <h3 class="Card-Box_dayMode_cardTitle Card-Box_dayMode_title pt-4 pb-3 px-3 text-right"> یادداشت ها</h3>
                                </div>
                            </div>
                            <div class="row" id="listOfTodos">
                                <div class="col-md-12">
                                    <ul class="list">
                                        @if(isset($todos))
                                            @foreach($todos as $key=>$todo)
                                                @if($todo->done)
                                                    <li class="list-item">
                                                        <input name="done" type="checkbox" onclick="task_done('{{$todo->id}}')" class="hidden-box active" id="todo[{{$key}}]"/>
                                                        <label for="todo[{{$key}}]" class="check--label">
                                                            <span class="check--label-box checkBoxDone"></span>
                                                            <span id="todo_checkbox_{{$todo->id}}" class="check--label-text checkDone">{{$todo->task}}</span>
                                                            <form method="post" action="/todos/{{$todo->id}}">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="hi-button-btn1 todo_deleteBtn"><i class="fa fa-times grey-text"></i> </button>
                                                            </form>
                                                        </label>
                                                    </li>
                                                @else
                                                    <li class="list-item">
                                                        <input name="done" type="checkbox" onclick="task_done('{{$todo->id}}')" class="hidden-box" id="todo[{{$key}}]"/>
                                                        <label for="todo[{{$key}}]" class="check--label">
                                                            <span class="check--label-box"></span>
                                                            <span class="check--label-text">{{$todo->task}}</span>
                                                            <form method="post" action="/todos/{{$todo->id}}">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="hi-button-btn1 todo_deleteBtn"><i class="fa fa-times grey-text"></i> </button>
                                                            </form>
                                                        </label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <form action="/todos" method="post" class="form-inline">
                                        {{csrf_field()}}
                                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                        <div class="input-group" id="addTodo">
                                            <button type="submit" id="tagSubmit"><img class="img-fluid" src="{{asset('images/Add-icone.png')}}"></button>
                                            <input name="task" type="text" class="form-control" id="todoText" placeholder="یادداشت جدید">
                                        </div>
                                        <button type="submit" id="hiddenSubmitBtn">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--==========[ Akharin Paiam ha Widget ]=========--}}
            <div class="col-12 col-md-4 grid-notif">
                <div class="homeCard">
                    <div class="Card-Box Card-Box_dayMode hi-shadow-1">
                        {{--==========[ Header Of Card ]=========--}}
                        <div class="container-fluid">
                            <div class="row indigo Card_Header mb-2">
                                <div class="col-6">
                                    <button class="inbox_btn">مشاهده همه</button>
                                </div>
                                <div class="col-6">
                                    <h3 class="Card-Box_dayMode_cardTitle Card-Box_dayMode_title pt-4 pb-3 px-1 text-right"> آخرین پیام ها</h3>
                                </div>
                            </div>
                        </div>
                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text indigo-text hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text indigo-text hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text indigo-text hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text indigo-text hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                    </div>
                </div>
            </div>
            {{--==========[ Akharin Faaliat ha Widget ]=========--}}
            <div class="col-12 col-md-4 grid-notif">
                <div class="homeCard">
                    <div class="Card-Box Card-Box_dayMode hi-shadow-1">
                        {{--==========[ Header Of Card ]=========--}}
                        <div class="container-fluid">
                            <div class="row teal darken-3 Card_Header mb-2">
                                <div class="col-md-12">
                                    <h3 class="Card-Box_dayMode_cardTitle Card-Box_dayMode_title pt-4 pb-3 px-3 text-right"> آخرین فعالیت ها</h3>
                                </div>
                            </div>
                        </div>
                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text teal-text text-darken-3 hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text teal-text text-darken-3 hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text teal-text text-darken-3 hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                        <!-------- Start of Cell Block -------->
                        <div class="ListCellWithIcon">
                            <div class="row">
                                <div class="col-10">
                                    {{--==========[ Title Of List ]=========--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="Card-Box__text text-right hi-fontSize-14">سبحان اسکندری</p>
                                        </div>
                                    </div>

                                    {{--==========[ Text Of List ]=========--}}
                                    <p class="Card-Box__text Card-Box_dayMode_text text-right">ما در اینجا یک باکس اطلااعات داریم که پیغام ها در آن میاید</p>
                                    <p class="Card-Box__text Card-Box_dayMode_text teal-text text-darken-3 hi-fontSize-11 text-right"><i class="fa fa-clock-o" aria-hidden="true"></i> ۳ ساعت پیش </p>
                                </div>
                                {{--==========[ Avatar of List ]=========--}}
                                <div class="col-2 ListCellWithIcon__Icon">
                                    <img alt="در حال بارگزاری عکس" class="rounded-circle" src="{{asset('images/avatar.png')}}">
                                </div>
                            </div>
                            <hr class="dayMode_line">
                        </div>
                        <!--******* End of Cell Block *******-->

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('js_resources')
    <script src="{{ asset('Hi_Framework/css/Loader/Other Libraries/Progressbar/progressbar.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Carousel/Other Libraries/Flicklity/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Drag/Other Libraries/Draggabilly/draggabilly.pkgd.min.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-date.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Time And Date Picker/Other Libraries/PersianDatePicker/persian-datepicker-0.4.5.js') }}"></script>
    <script src="{{ asset('Hi_Framework/css/Grid/Other Libraries/Packery/packery.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('js/weather.js') }}"></script>
    <script src="{{ asset('Hi_Framework/javascript/Chart/Other Libraries/Chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('js/chartjs.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/clock.js') }}"></script>
    <script src="{{ asset('js/dashboard/todo.js') }}"></script>
@endsection