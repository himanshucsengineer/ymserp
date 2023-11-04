<?php $currentUrl = url()->full(); 
    $getid = explode('=',$currentUrl);
?>

@extends('common.layout')

@section('content')

<style>
.card-primary.card-outline{
    border-top: 3px solid #63bf84;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
    color:#63bf84;
}

.image-container {
    position: relative;
    display: inline-block;
    margin: 20px;
}
.hotspot {
    position: absolute;
    cursor: pointer;
}

.circle img,
.circle{
    width: 30px;
    height: 30px;
    border-radius: 320px;
    display: inline-block;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -ms-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
    background-color:#dc354594;
    }


   
.icon .circle,
.icon .circle img{
    width: 80px;
    height: 80px;
    
}

.circle{
     background: #dc354594;
}

.circle.small{
    -webkit-transform: scale(.7);
    -moz-transform: scale(.7);
    transform: scale(.7);

}

@-moz-keyframes shake {
	0% { -moz-transform: translate(2px, 1px) rotate(0deg); }
	10% { -moz-transform: translate(-1px, -2px) rotate(-1deg); }
	20% { -moz-transform: translate(-3px, 0px) rotate(1deg); }
	30% { -moz-transform: translate(0px, 2px) rotate(0deg); }
	40% { -moz-transform: translate(1px, -1px) rotate(1deg); }
	50% { -moz-transform: translate(-1px, 2px) rotate(-1deg); }
	60% { -moz-transform: translate(-3px, 1px) rotate(0deg); }
	70% { -moz-transform: translate(2px, 1px) rotate(-1deg); }
	80% { -moz-transform: translate(-1px, -1px) rotate(1deg); }
	90% { -moz-transform: translate(2px, 2px) rotate(0deg); }
	100% { -moz-transform: translate(1px, -2px) rotate(-1deg); }
}
@-webkit-keyframes shake {
	0% { -webkit-transform: translate(2px, 1px) rotate(0deg); }
	10% { -webkit-transform: translate(-1px, -2px) rotate(-1deg); }
	20% { -webkit-transform: translate(-3px, 0px) rotate(1deg); }
	30% { -webkit-transform: translate(0px, 2px) rotate(0deg); }
	40% { -webkit-transform: translate(1px, -1px) rotate(1deg); }
	50% { -webkit-transform: translate(-1px, 2px) rotate(-1deg); }
	60% { -webkit-transform: translate(-3px, 1px) rotate(0deg); }
	70% { -webkit-transform: translate(2px, 1px) rotate(-1deg); }
	80% { -webkit-transform: translate(-1px, -1px) rotate(1deg); }
	90% { -webkit-transform: translate(2px, 2px) rotate(0deg); }
	100% { -webkit-transform: translate(1px, -2px) rotate(-1deg); }
}


@keyframes shake {
	0% { transform: translate(2px, 1px) rotate(0deg); }
	10% { transform: translate(-1px, -2px) rotate(-1deg); }
	20% { transform: translate(-3px, 0px) rotate(1deg); }
	30% { transform: translate(0px, 2px) rotate(0deg); }
	40% { transform: translate(1px, -1px) rotate(1deg); }
	50% { transform: translate(-1px, 2px) rotate(-1deg); }
	60% { transform: translate(-3px, 1px) rotate(0deg); }
	70% { transform: translate(2px, 1px) rotate(-1deg); }
	80% { transform: translate(-1px, -1px) rotate(1deg); }
	90% { transform: translate(2px, 2px) rotate(0deg); }
	100% {transform: translate(1px, -2px) rotate(-1deg); }
}

a.open:hover .circle{
	-webkit-animation-name: shake;
	-webkit-animation-duration: 0.8s;
	-webkit-transform-origin:50% 50%;
	-webkit-animation-iteration-count: infinite;
	-webkit-animation-timing-function: linear;
	
	-moz-animation-name: shake;
	-moz-animation-duration: 0.8s;
	-moz-transform-origin:50% 50%;
	-moz-animation-iteration-count: infinite;
	-moz-animation-timing-function: linear;

}

a.open .circle img{
    opacity: 0;
}
.current a.open .circle img,
a.open:hover  .circle img{
    opacity: 1;
}

.box{
     text-align: center;
     width: 19.9%;
     margin: 0;
     float: left;
     margin-bottom: 5px;
     box-sizing: content-box;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Surveyor Master</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Surveyor Master</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                        aria-selected="true">DAMAGE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-three-profile" role="tab"
                                        aria-controls="custom-tabs-three-profile" aria-selected="false">DETAILS</a>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4"><button type="button" class="btn btn-block btn-outline-success" onclick="showRight()">Right</button></div>
                                                <div class="col-md-4"><button type="button" class="btn btn-block btn-outline-success" onclick="showLeft()">Left</button></div>
                                                <div class="col-md-4"><button type="button" class="btn btn-block btn-outline-success" onclick="showTop()">Top</button></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4"><button type="button" class="btn btn-block btn-outline-success" onclick="showBottom()">Bottom</button></div>
                                                <div class="col-md-4"><button type="button" class="btn btn-block btn-outline-success" onclick="showFront()">Front</button></div>
                                                <div class="col-md-4"><button type="button" class="btn btn-block btn-outline-success" onclick="showDoor()">Door</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8" id="right">
                                            <h3>SIDE RIGHT  CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/right.jpeg" alt="Image with Hotspots" style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px;">
                                                <a href="#" class="open"  data-id="RH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; ">
                                                <a href="#" class="open" data-id="RX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="RX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="RB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 130px; " >
                                                <a href="#" class="open" data-id="RX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; " >
                                                <a href="#" class="open" data-id="RX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="RB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            
                                            <div class="hotspot" style="left: 300px; top: 130px; " >
                                                <a href="#" class="open" data-id="RX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; " >
                                                <a href="#" class="open" data-id="RX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 130px; " >
                                                <a href="#" class="open" data-id="RX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; " >
                                                <a href="#" class="open" data-id="RX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="RB3X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; " >
                                                <a href="#" class="open" data-id="RH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; " >
                                                <a href="#" class="open" data-id="RX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="RX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="RB4X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
       
                                        </div>

                                        <div class="col-md-8" id="left" style="display:none">
                                            <h3>SIDE LEFT  CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/left.jpeg" alt="Image with Hotspots" style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px;">
                                                <a href="#" class="open"  data-id="LH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; ">
                                                <a href="#" class="open" data-id="LX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="LX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="LB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 130px; " >
                                                <a href="#" class="open" data-id="LX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; " >
                                                <a href="#" class="open" data-id="LX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="LB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            
                                            <div class="hotspot" style="left: 300px; top: 130px; " >
                                                <a href="#" class="open" data-id="LX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; " >
                                                <a href="#" class="open" data-id="LX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 130px; " >
                                                <a href="#" class="open" data-id="LX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; " >
                                                <a href="#" class="open" data-id="LX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="LB3X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; " >
                                                <a href="#" class="open" data-id="LH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; " >
                                                <a href="#" class="open" data-id="LX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="LX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="LB4X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
       
                                        </div>

                                        <div class="col-md-8" id="top" style="display:none">
                                            <h3>SIDE TOP  CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/top.jpeg" alt="Image with Hotspots" style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px; ">
                                                <a href="#" class="open" data-id="TH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; " >
                                                <a href="#" class="open" data-id="TX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="TX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="TB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            

                                            <div class="hotspot" style="left: 180px; top: 130px; " >
                                                <a href="#" class="open" data-id="TX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; " >
                                                <a href="#" class="open" data-id="TX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            

                                            
                                            <div class="hotspot" style="left: 300px; top: 130px; " >
                                                <a href="#" class="open" data-id="TX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; " >
                                                <a href="#" class="open" data-id="TX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            

                                            <div class="hotspot" style="left: 420px; top: 130px; " >
                                                <a href="#" class="open" data-id="TX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; " >
                                                <a href="#" class="open" data-id="TX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; " >
                                                <a href="#" class="open" data-id="TH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; " >
                                                <a href="#" class="open" data-id="TX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="TX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="TB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
       
                                        </div>

                                        <div class="col-md-8" id="bottom" style="display:none">
                                            <h3>SIDE BOTTOM  CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/bottom.jpeg" alt="Image with Hotspots" style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px; ">
                                                <a href="#" class="open" data-id="BH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; " >
                                                <a href="#" class="open" data-id="BX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="BX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="BB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            

                                            <div class="hotspot" style="left: 180px; top: 130px; " >
                                                <a href="#" class="open" data-id="BX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; " >
                                                <a href="#" class="open" data-id="BX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            

                                            
                                            <div class="hotspot" style="left: 300px; top: 130px; " >
                                                <a href="#" class="open" data-id="BX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; " >
                                                <a href="#" class="open" data-id="BX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            

                                            <div class="hotspot" style="left: 420px; top: 130px; " >
                                                <a href="#" class="open" data-id="BX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; " >
                                                <a href="#" class="open" data-id="BX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; " >
                                                <a href="#" class="open" data-id="BH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; " >
                                                <a href="#" class="open" data-id="BX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; " >
                                                <a href="#" class="open" data-id="BX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; " >
                                                <a href="#" class="open" data-id="BB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
       
                                        </div>

                                        <div class="col-md-8" id="front" style="display:none">
                                            <h3>SIDE FRONT  CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/front.jpeg" alt="Image with Hotspots" style="width:100%" id="image">
                                            <div class="hotspot" style="left: 20px; top: 80px; ">
                                                <a href="#" class="open" data-id="FH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 20px; bottom: 10px; " >
                                                <a href="#" class="open" data-id="FB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 20px; top: 80px; ">
                                                <a href="#" class="open" data-id="FH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="right: 20px; bottom: 10px; " >
                                                <a href="#" class="open" data-id="FB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            
                                            <div class="hotspot" style="left: 180px; top: 230px; " >
                                                <a href="#" class="open" data-id="FX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: 180px; " >
                                                <a href="#" class="open" data-id="FX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; top: 230px; " >
                                                <a href="#" class="open" data-id="FX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; bottom: 180px; " >
                                                <a href="#" class="open" data-id="FX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-8" id="door" style="display:none">
                                            <h3>SIDE DOOR  CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/back.jpeg" alt="Image with Hotspots" style="width:100%" id="image">
                                            <div class="hotspot" style="left: 20px; top: 80px; ">
                                                <a href="#" class="open" data-id="DH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 20px; bottom: 10px; " >
                                                <a href="#" class="open" data-id="DB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 20px; top: 80px; ">
                                                <a href="#" class="open" data-id="DH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="right: 20px; bottom: 10px; " >
                                                <a href="#" class="open" data-id="DB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            
                                            <div class="hotspot" style="left: 180px; top: 230px; " >
                                                <a href="#" class="open" data-id="DX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: 180px; " >
                                                <a href="#" class="open" data-id="DX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; top: 230px; " >
                                                <a href="#" class="open" data-id="DX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; bottom: 180px; " >
                                                <a href="#" class="open" data-id="DX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-profile-tab">
                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra
                                    purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et
                                    ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl
                                    ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus,
                                    elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>

function showRight(){
    $('#right').show();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
}

function showLeft(){
    $('#right').hide();
    $('#left').show();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
}

function showTop(){
    $('#right').hide();
    $('#left').hide();
    $('#top').show();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
}

function showBottom(){
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').show();
    $('#front').hide();
    $('#door').hide();
}

function showFront(){
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').show();
    $('#door').hide();
}

function showDoor(){
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').show();
}

function openModel(){
    console.log();
}
$('.open').click(function() {
        // Get the data-id attribute value
        var dataIdValue = $(this).data('id');
        
        // Do something with the dataIdValue
        console.log('data-id attribute value: ' + dataIdValue);
        $('#modal-xl').modal('show');
    });

$(document).ready(function() {
    var containerid = <?= $getid[1]?>;
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "POST",
        url: "/api/gatein/getDataById",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': containerid
        },
        success: function(data) {
            console.log(data);
            $('.container_no').text(data.container_no);
            gettarrif(data.line_id);
        },
        error: function(error) {
            console.log(error);
        }
    });
});


function gettarrif(id) {
    $.ajax({
        type: "POST",
        url: "/api/tarrif/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': id
        },
        success: function(data) {
            console.log(data);
            // $("#line_id").val(data.name);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

</script>


<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Extra Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection