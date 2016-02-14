@extends('layouts.default')
@section('header')
<link href="{{asset('themes/blog/css/style.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('body')
<div id="bk">
    <img src="{{asset('images/bk0.jpg')}}" >
</div>
<div class="middle">
    <div class="container" style="height:682px;">
        <table class="breviary1 breviary">
            <tr id="cow1">
                <td class="column2">
                    <h4>
                        TITLE
                        </br>
                    </h4>
                    <p class="content">This is  a sample. But not perfect<br>
                        Any suggestion pls contace me ,<br>
                        Dont be hesitate. Come on this is<br>
                        just word,do not read these.If you<br>
                        really have read it. I have to say<br>
                        you are awesome</p>
                    <div class="more">
                        <i class= "fa fa-chevron-right more_right" ></i>
                        <i class= "fa fa-chevron-right more_right" ></i>
                    </div>
                </td>
            </tr>
            <tr id="cow2">
                <td class="column4">
                    <div class="more">
                        <i class= "fa fa-chevron-right more_right" ></i>
                        <i class= "fa fa-chevron-right more_right" ></i>
                    </div>
                </td>
            </tr>
        </table>
        <table  class="breviary2 breviary" style="position: absolute;right: 50%;margin-right: -203px">
            <tr id="cow3" class="showbox">
                <td>
                <img style="width: 425px;height: 316px;" src="images/middle.jpg">
                </td>
            </tr>
            <tr id="cow4">
                <td style="width: 381px;height:371 ;">
                    <h4 style="margin-top: 50px;margin-bottom: 10px;">ROAD TRIPPING</h4>
                    <div class="red_line"></div>
                    <p style="margin-top: 25px;text-align: left;position: absolute;left:50%;margin-left: -139px" class="content">This is  a sample. But not perfect Any suggestion<br>
                        pls contace me ,Dont be hesitate. Come on this is<br>
                        just word,do not read these.If you really have read<br>
                        it. I have to say  you are awesome ! </p>
                    <button style="position: absolute;bottom: 5%;left:50%;width:66px;margin-left:-33px" class="button-borderless" >page1 <i class="fa  fa-long-arrow-right" style="color:#868686;"></i></button>
                </td>
            </tr>
        </table>
        <table  class="breviary3 breviary" style="position: absolute;right: 0%;">
            <tr id="cow5">
                <td class="column2">
                    <div class="more">
                        <i class= "fa fa-chevron-right more_right" ></i>
                        <i class= "fa fa-chevron-right more_right" ></i>
                    </div>
                </td>
            </tr>
            <tr id="cow6">
                <td class="column3"></td>
                <td class="column4">
                    <div class="more">
                        <i class= "fa fa-chevron-right more_right" ></i>
                        <i class= "fa fa-chevron-right more_right" ></i>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class = "container footer">
        <h4 style="color: #474747;font-family: SourceSansProLight;text-align: left;position: absolute;left:30.3%">
            Time flies .......<br>
            But I still on my way
        </h4>
        <div id="clock">
            <div id="months"></div>
            <svg class="line">
                <path fill="none" stroke="rgb(223,210,183)" stroke-width="1" stroke-miterlimit="10" d="M90.333,50.5h106l24,24l24-24h106"></path>
            </svg>
        </div>
</div>
<div class = "clearfix"></div>
<script type="text/javascript" src="{{asset('themes/blog/js/index.js')}}"></script>
@endsection