<?php $currentUrl = url()->full(); 
    $getid = explode('=',$currentUrl);
?>

@extends('common.layout')

@section('content')

<style>
#transaction_total, #transaction_sub_total, #transaction_tax, #transaction_tax_cost, #transaction_material_cost, #transaction_labour_hr, #transaction_labour_cost{
    width: 100px !important;
}
.hidden {
    display: none;
}

.card-primary.card-outline {
    border-top: 3px solid #63bf84;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: #63bf84;
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
.circle {
    width: 30px;
    height: 30px;
    border-radius: 320px;
    display: inline-block;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -ms-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
    background-color: #dc354594;
}



.icon .circle,
.icon .circle img {
    width: 80px;
    height: 80px;

}

.circle {
    background: #dc354594;
}

.circle.small {
    -webkit-transform: scale(.7);
    -moz-transform: scale(.7);
    transform: scale(.7);

}

@-moz-keyframes shake {
    0% {
        -moz-transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        -moz-transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        -moz-transform: translate(-3px, 0px) rotate(1deg);
    }

    30% {
        -moz-transform: translate(0px, 2px) rotate(0deg);
    }

    40% {
        -moz-transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        -moz-transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        -moz-transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        -moz-transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        -moz-transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        -moz-transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        -moz-transform: translate(1px, -2px) rotate(-1deg);
    }
}

@-webkit-keyframes shake {
    0% {
        -webkit-transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        -webkit-transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        -webkit-transform: translate(-3px, 0px) rotate(1deg);
    }

    30% {
        -webkit-transform: translate(0px, 2px) rotate(0deg);
    }

    40% {
        -webkit-transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        -webkit-transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        -webkit-transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        -webkit-transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        -webkit-transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        -webkit-transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        -webkit-transform: translate(1px, -2px) rotate(-1deg);
    }
}


@keyframes shake {
    0% {
        transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        transform: translate(-3px, 0px) rotate(1deg);
    }

    30% {
        transform: translate(0px, 2px) rotate(0deg);
    }

    40% {
        transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        transform: translate(1px, -2px) rotate(-1deg);
    }
}

a.open:hover .circle {
    -webkit-animation-name: shake;
    -webkit-animation-duration: 0.8s;
    -webkit-transform-origin: 50% 50%;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;

    -moz-animation-name: shake;
    -moz-animation-duration: 0.8s;
    -moz-transform-origin: 50% 50%;
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: linear;

}

a.open .circle img {
    opacity: 0;
}

.current a.open .circle img,
a.open:hover .circle img {
    opacity: 1;
}

.box {
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
                                                <div class="col-md-4"><button type="button"
                                                        class="btn btn-block btn-outline-success"
                                                        onclick="showRight()">Right</button></div>
                                                <div class="col-md-4"><button type="button"
                                                        class="btn btn-block btn-outline-success"
                                                        onclick="showLeft()">Left</button></div>
                                                <div class="col-md-4"><button type="button"
                                                        class="btn btn-block btn-outline-success"
                                                        onclick="showTop()">Top</button></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4"><button type="button"
                                                        class="btn btn-block btn-outline-success"
                                                        onclick="showBottom()">Bottom</button></div>
                                                <div class="col-md-4"><button type="button"
                                                        class="btn btn-block btn-outline-success"
                                                        onclick="showFront()">Front</button></div>
                                                <div class="col-md-4"><button type="button"
                                                        class="btn btn-block btn-outline-success"
                                                        onclick="showDoor()">Door</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-md-8" id="right">
                                            <h3>SIDE RIGHT CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/right.jpeg" alt="Image with Hotspots"
                                                style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px;">
                                                <a href="#" class="open hidden" id="RH1X" data-id="RH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="RX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="RX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="RB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="RX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="RX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="RB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>


                                            <div class="hotspot" style="left: 300px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="RX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="RX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="RX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="RX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="RB3X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; ">
                                                <a href="#" class="open hidden" data-id="RH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="RX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="RX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="RB4X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="col-md-8" id="left" style="display:none">
                                            <h3>SIDE LEFT CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/left.jpeg" alt="Image with Hotspots"
                                                style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px;">
                                                <a href="#" class="open hidden" data-id="LH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="LX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="LX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="LB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="LX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="LX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="LB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>


                                            <div class="hotspot" style="left: 300px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="LX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="LX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="LX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="LX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="LB3X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; ">
                                                <a href="#" class="open hidden" data-id="LH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="LX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="LX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="LB4X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="col-md-8" id="top" style="display:none">
                                            <h3>SIDE TOP CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/top.jpeg" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px; ">
                                                <a href="#" class="open hidden" data-id="TH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="TX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="TX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="TB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>



                                            <div class="hotspot" style="left: 180px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="TX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="TX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>




                                            <div class="hotspot" style="left: 300px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="TX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="TX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>



                                            <div class="hotspot" style="left: 420px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="TX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="TX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; ">
                                                <a href="#" class="open hidden" data-id="TH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="TX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="TX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="TB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="col-md-8" id="bottom" style="display:none">
                                            <h3>SIDE BOTTOM CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/bottom.jpeg" alt="Image with Hotspots"
                                                style="width:100%" id="image">
                                            <div class="hotspot" style="left: 10px; top: 65px; ">
                                                <a href="#" class="open hidden" data-id="BH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="BX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="BX6N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="BB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>



                                            <div class="hotspot" style="left: 180px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="BX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="BX7N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>




                                            <div class="hotspot" style="left: 300px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="BX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 300px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="BX8N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>



                                            <div class="hotspot" style="left: 420px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="BX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 420px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="BX9N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; top: 65px; ">
                                                <a href="#" class="open hidden" data-id="BH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 130px; ">
                                                <a href="#" class="open hidden" data-id="BX5N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 60px; top: 240px; ">
                                                <a href="#" class="open hidden" data-id="BX0N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 10px; bottom: -10px; ">
                                                <a href="#" class="open hidden" data-id="BB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="col-md-8" id="front" style="display:none">
                                            <h3>SIDE FRONT CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/front.jpeg" alt="Image with Hotspots"
                                                style="width:100%" id="image">
                                            <div class="hotspot" style="left: 20px; top: 80px; ">
                                                <a href="#" class="open hidden" data-id="FH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 20px; bottom: 10px; ">
                                                <a href="#" class="open hidden" data-id="FB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 20px; top: 80px; ">
                                                <a href="#" class="open hidden" data-id="FH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="right: 20px; bottom: 10px; ">
                                                <a href="#" class="open hidden" data-id="FB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 230px; ">
                                                <a href="#" class="open hidden" data-id="FX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: 180px; ">
                                                <a href="#" class="open hidden" data-id="FX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; top: 230px; ">
                                                <a href="#" class="open hidden" data-id="FX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; bottom: 180px; ">
                                                <a href="#" class="open hidden" data-id="FX4N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-8" id="door" style="display:none">
                                            <h3>SIDE DOOR CONTAINER NUMBER:<span class="container_no"></span></h3>
                                            <hr>
                                            <img src="/assets/img/back.jpeg" alt="Image with Hotspots"
                                                style="width:100%" id="image">
                                            <div class="hotspot" style="left: 20px; top: 80px; ">
                                                <a href="#" class="open hidden" data-id="DH1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="left: 20px; bottom: 10px; ">
                                                <a href="#" class="open hidden" data-id="DB1X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="right: 20px; top: 80px; ">
                                                <a href="#" class="open hidden" data-id="DH2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>
                                            <div class="hotspot" style="right: 20px; bottom: 10px; ">
                                                <a href="#" class="open hidden" data-id="DB2X">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; top: 230px; ">
                                                <a href="#" class="open hidden" data-id="DX1N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 180px; bottom: 180px; ">
                                                <a href="#" class="open hidden" data-id="DX3N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; top: 230px; ">
                                                <a href="#" class="open hidden" data-id="DX2N">
                                                    <span class="circle small"></span>
                                                </a>
                                            </div>

                                            <div class="hotspot" style="left: 450px; bottom: 180px; ">
                                                <a href="#" class="open hidden" data-id="DX4N">
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
                    <input type="hidden" id="line_id_no">
                </div>
            </div>
        </div>
    </section>
</div>



<script>
function showRight() {
    $('#right').show();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
}

function showLeft() {
    $('#right').hide();
    $('#left').show();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
}

function showTop() {
    $('#right').hide();
    $('#left').hide();
    $('#top').show();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
}

function showBottom() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').show();
    $('#front').hide();
    $('#door').hide();
}

function showFront() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').show();
    $('#door').hide();
}

function showDoor() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').show();
}


$('.open').click(function() {
    var dataIdValue = $(this).data('id');
    var line_id = $('#line_id_no').val();
    gettarrif(dataIdValue, line_id);
    $('#side').val(dataIdValue);
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
            $('.container_no').text(data.container_no);
            $('#modal_container_no').val(data.container_no);
            $('#line_id_no').val(data.line_id);
            getTarrifByLine(data.line_id);
        },
        error: function(error) {
            console.log(error);
        }
    });
});


function getTarrifByLine(line_id) {
    $.ajax({
        type: "POST",
        url: "/api/tarrif/getTarrifByLine",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'line_id': line_id,
        },
        success: function(data) {
            if (data.find(x => x.repai_location_code == 'RH1X')) {
                $('a[data-id="RH1X').show();
            }
            if (data.find(x => x.repai_location_code == 'RX1N')) {
                $('a[data-id="RX1N').show();
            }
            if (data.find(x => x.repai_location_code == 'RX6N')) {
                $('a[data-id="RX6N').show();
            }
            if (data.find(x => x.repai_location_code == 'RB1X')) {
                $('a[data-id="RB1X').show();
            }
            if (data.find(x => x.repai_location_code == 'RX2N')) {
                $('a[data-id="RX2N').show();
            }
            if (data.find(x => x.repai_location_code == 'RX7N')) {
                $('a[data-id="RX7N').show();
            }
            if (data.find(x => x.repai_location_code == 'RB2X')) {
                $('a[data-id="RB2X').show();
            }
            if (data.find(x => x.repai_location_code == 'RX3N')) {
                $('a[data-id="RX3N').show();
            }
            if (data.find(x => x.repai_location_code == 'RX8N')) {
                $('a[data-id="RX8N').show();
            }
            if (data.find(x => x.repai_location_code == 'RX4N')) {
                $('a[data-id="RX4N').show();
            }
            if (data.find(x => x.repai_location_code == 'RX9N')) {
                $('a[data-id="RX9N').show();
            }
            if (data.find(x => x.repai_location_code == 'RB3X')) {
                $('a[data-id="RB3X').show();
            }
            if (data.find(x => x.repai_location_code == 'RH2X')) {
                $('a[data-id="RH2X').show();
            }
            if (data.find(x => x.repai_location_code == 'RX5N')) {
                $('a[data-id="RX5N').show();
            }
            if (data.find(x => x.repai_location_code == 'RX0N')) {
                $('a[data-id="RX0N').show();
            }
            if (data.find(x => x.repai_location_code == 'RB4X')) {
                $('a[data-id="RB4X').show();
            }
            if (data.find(x => x.repai_location_code == 'LH1X')) {
                $('a[data-id="LH1X').show();
            }
            if (data.find(x => x.repai_location_code == 'LX1N')) {
                $('a[data-id="LX1N').show();
            }
            if (data.find(x => x.repai_location_code == 'LX6N')) {
                $('a[data-id="LX6N').show();
            }
            if (data.find(x => x.repai_location_code == 'LB1X')) {
                $('a[data-id="LB1X').show();
            }
            if (data.find(x => x.repai_location_code == 'LX2N')) {
                $('a[data-id="LX2N').show();
            }
            if (data.find(x => x.repai_location_code == 'LX7N')) {
                $('a[data-id="LX7N').show();
            }
            if (data.find(x => x.repai_location_code == 'LB2X')) {
                $('a[data-id="LB2X').show();
            }
            if (data.find(x => x.repai_location_code == 'LX3N')) {
                $('a[data-id="LX3N').show();
            }
            if (data.find(x => x.repai_location_code == 'LX8N')) {
                $('a[data-id="LX8N').show();
            }
            if (data.find(x => x.repai_location_code == 'LX4N')) {
                $('a[data-id="LX4N').show();
            }
            if (data.find(x => x.repai_location_code == 'LX9N')) {
                $('a[data-id="LX9N').show();
            }
            if (data.find(x => x.repai_location_code == 'LB3X')) {
                $('a[data-id="LB3X').show();
            }
            if (data.find(x => x.repai_location_code == 'LH2X')) {
                $('a[data-id="LH2X').show();
            }
            if (data.find(x => x.repai_location_code == 'LX5N')) {
                $('a[data-id="LX5N').show();
            }
            if (data.find(x => x.repai_location_code == 'LX0N')) {
                $('a[data-id="LX0N').show();
            }
            if (data.find(x => x.repai_location_code == 'LB4X')) {
                $('a[data-id="LB4X').show();
            }
            if (data.find(x => x.repai_location_code == 'TH1X')) {
                $('a[data-id="TH1X').show();
            }
            if (data.find(x => x.repai_location_code == 'TX1N')) {
                $('a[data-id="TX1N').show();
            }
            if (data.find(x => x.repai_location_code == 'TX6N')) {
                $('a[data-id="TX6N').show();
            }
            if (data.find(x => x.repai_location_code == 'TB1X')) {
                $('a[data-id="TB1X').show();
            }
            if (data.find(x => x.repai_location_code == 'TX2N')) {
                $('a[data-id="TX2N').show();
            }
            if (data.find(x => x.repai_location_code == 'TX7N')) {
                $('a[data-id="TX7N').show();
            }
            if (data.find(x => x.repai_location_code == 'TX8N')) {
                $('a[data-id="TX8N').show();
            }
            if (data.find(x => x.repai_location_code == 'TX4N')) {
                $('a[data-id="TX4N').show();
            }
            if (data.find(x => x.repai_location_code == 'TX9N')) {
                $('a[data-id="TX9N').show();
            }
            if (data.find(x => x.repai_location_code == 'TH2X')) {
                $('a[data-id="TH2X').show();
            }
            if (data.find(x => x.repai_location_code == 'TX5N')) {
                $('a[data-id="TX5N').show();
            }
            if (data.find(x => x.repai_location_code == 'TX0N')) {
                $('a[data-id="TX0N').show();
            }
            if (data.find(x => x.repai_location_code == 'TB2X')) {
                $('a[data-id="TB2X').show();
            }
            if (data.find(x => x.repai_location_code == 'BH1X')) {
                $('a[data-id="BH1X').show();
            }
            if (data.find(x => x.repai_location_code == 'BX1N')) {
                $('a[data-id="BX1N').show();
            }
            if (data.find(x => x.repai_location_code == 'BX6N')) {
                $('a[data-id="BX6N').show();
            }
            if (data.find(x => x.repai_location_code == 'BB1X')) {
                $('a[data-id="BB1X').show();
            }
            if (data.find(x => x.repai_location_code == 'BX2N')) {
                $('a[data-id="BX2N').show();
            }
            if (data.find(x => x.repai_location_code == 'BX7N')) {
                $('a[data-id="BX7N').show();
            }
            if (data.find(x => x.repai_location_code == 'BX8N')) {
                $('a[data-id="BX8N').show();
            }
            if (data.find(x => x.repai_location_code == 'BX4N')) {
                $('a[data-id="BX4N').show();
            }
            if (data.find(x => x.repai_location_code == 'BX9N')) {
                $('a[data-id="BX9N').show();
            }
            if (data.find(x => x.repai_location_code == 'BH2X')) {
                $('a[data-id="BH2X').show();
            }
            if (data.find(x => x.repai_location_code == 'BX5N')) {
                $('a[data-id="BX5N').show();
            }
            if (data.find(x => x.repai_location_code == 'BX0N')) {
                $('a[data-id="BX0N').show();
            }
            if (data.find(x => x.repai_location_code == 'BB2X')) {
                $('a[data-id="BB2X').show();
            }
            if (data.find(x => x.repai_location_code == 'FH1X')) {
                $('a[data-id="FH1X').show();
            }
            if (data.find(x => x.repai_location_code == 'FB1X')) {
                $('a[data-id="FB1X').show();
            }
            if (data.find(x => x.repai_location_code == 'FH2X')) {
                $('a[data-id="FH2X').show();
            }
            if (data.find(x => x.repai_location_code == 'FB2X')) {
                $('a[data-id="FB2X').show();
            }
            if (data.find(x => x.repai_location_code == 'FX1N')) {
                $('a[data-id="FX1N').show();
            }
            if (data.find(x => x.repai_location_code == 'FX3N')) {
                $('a[data-id="FX3N').show();
            }
            if (data.find(x => x.repai_location_code == 'FX2N')) {
                $('a[data-id="FX2N').show();
            }
            if (data.find(x => x.repai_location_code == 'FX4N')) {
                $('a[data-id="FX4N').show();
            }
            if (data.find(x => x.repai_location_code == 'DH1X')) {
                $('a[data-id="DH1X').show();
            }
            if (data.find(x => x.repai_location_code == 'DB1X')) {
                $('a[data-id="DB1X').show();
            }
            if (data.find(x => x.repai_location_code == 'DH2X')) {
                $('a[data-id="DH2X').show();
            }
            if (data.find(x => x.repai_location_code == 'DB2X')) {
                $('a[data-id="DB2X').show();
            }
            if (data.find(x => x.repai_location_code == 'DX1N')) {
                $('a[data-id="DX1N').show();
            }
            if (data.find(x => x.repai_location_code == 'DX3N')) {
                $('a[data-id="DX3N').show();
            }
            if (data.find(x => x.repai_location_code == 'DX2N')) {
                $('a[data-id="DX2N').show();
            }
            if (data.find(x => x.repai_location_code == 'DX4N')) {
                $('a[data-id="DX4N').show();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function gettarrif(location_code, line_id) {
    $.ajax({
        type: "POST",
        url: "/api/tarrif/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'line_id': line_id,
            'location_code': location_code
        },
        success: function(data) {
            $("#component_code").val(data.component_code);
            $("#tarrif_id").val(data.id);
            $("#labour_hr").val(data.labour_hour);
            $("#labour_cost").val(data.labour_cost);
            $("#material_cost").val(data.material_cost);
            $("#sab_total").val(data.sub_total);
            $("#tax_cost").val(data.tax_cost);
            $("#gst").val(data.tax);
            $("#total").val(data.total_cost);

            var tarrifData = data;


            getDamage(data.damade_id);
            getRepair(data.repair_id);
            getMaterial(data.material_id);

            getTransactionData(data.id, tarrifData);

        },
        error: function(error) {
            console.log(error);
        }
    });
}


function getTransactionData(tarrif_id, tarrifData){
    $.ajax({
        type: "POST",
        url: "/api/transcation/getbytarrif",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'tarrif_id': tarrif_id,
        },
        success: function(data) {
            console.log('fhdjksfhkjds',data);
            console.log('tarrifData',tarrifData)
            var tbody = $('#table-body');
            
            var i =1;
            data.forEach(function(item) {
                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').text($('#modal_container_no').val()));
                row.append($('<td>').text(tarrifData.component_code));
                row.append($('<td>').text(tarrifData.repai_location_code));
                row.append($('<td>').text($('#damage_code').text()));
                row.append($('<td>').text($('#repair_code').text()));
                row.append($('<td>').text($('#material_code').text()));
                row.append($('<td>').text(tarrifData.unit_of_measure));
                row.append($('<td>').text(tarrifData.dimension_w));
                row.append($('<td>').text(tarrifData.dimension_l));
                row.append($('<td>').text(tarrifData.dimension_h));
                row.append($('<td>').text(tarrifData.qty));
                var labour_hr = $('<input>').attr({'type':'text', 'id':'transaction_labour_hr', 'class':'form-control'}).val(item.labour_hr);
                row.append($('<td>').append(labour_hr));
                var labour_cost = $('<input>').attr({'type':'text', 'id':'transaction_labour_cost', 'class':'form-control'}).val(item.labour_cost);
                row.append($('<td>').append(labour_cost));
                var material_cost = $('<input>').attr({'type':'text', 'id':'transaction_material_cost','class':'form-control'}).val(item.material_cost);
                row.append($('<td>').append(material_cost));
                var sab_total = $('<input>').attr({'type':'text', 'id':'transaction_sub_total', 'readonly':'readonly', 'class':'form-control'}).val(item.sab_total);
                row.append($('<td>').append(sab_total));
                var gst = $('<input>').attr({'type':'text', 'id':'transaction_tax', 'readonly':'readonly', 'class':'form-control'}).val(item.gst);
                row.append($('<td>').append(gst));
                var tax_cost = $('<input>').attr({'type':'text', 'id':'transaction_tax_cost', 'readonly':'readonly', 'class':'form-control'}).val(item.tax_cost);
                row.append($('<td>').append(tax_cost));
                var total = $('<input>').attr({'type':'text', 'id':'transaction_total', 'readonly':'readonly', 'class':'form-control'}).val(item.total);
                row.append($('<td>').append(total));
                row.append($('<td>').text(item.labour_cost));
                tbody.append(row);
                i++;
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getDamage(id) {
    $.ajax({
        type: "POST",
        url: "/api/damage/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': id,
        },
        success: function(data) {
            var select = document.getElementById('damage_code');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.code;
                select.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getRepair(id) {
    $.ajax({
        type: "POST",
        url: "/api/repair/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': id
        },
        success: function(data) {
            var select = document.getElementById('repair_code');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.repair_code;
                select.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getMaterial(id) {
    $.ajax({
        type: "POST",
        url: "/api/material/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': id
        },
        success: function(data) {
            var select = document.getElementById('material_code');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.material_code;
                select.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>


<script>
function createTransaction(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var tarrif_id = $('#tarrif_id').val();
    var labour_hr = $('#labour_hr').val();
    var labour_cost = $('#labour_cost').val();
    var material_cost = $('#material_cost').val();
    var sab_total = $('#sab_total').val();
    var gst = $('#gst').val();
    var total = $('#total').val();
    var tax_cost = $('#tax_cost').val();
   

    var data = {
        'user_id':user_id,
        'depo_id':depo_id,
        'tarrif_id':tarrif_id,
        'labour_hr':labour_hr,
        'labour_cost':labour_cost,
        'material_cost':material_cost,
        'sab_total':sab_total,
        'gst':gst,
        'total':total,
        'tax_cost':tax_cost
    }

    post('transcation/create',data)


}


$('#transaction_labour_cost, #transaction_material_cost').on('keyup', function() {

console.log('gfgfduhu');

// var material_cost = $('#transaction_material_cost').val();
// var labour_cost = $('#transaction_labour_cost').val();
// var tax = $('#transaction_tax').val();
// var sub_total = parseInt(labour_cost) + parseInt(material_cost);
// $('#transaction_sub_total').val(sub_total);
// var tax_cost =  (parseInt(tax) / 100 ) * sub_total;
// $('#transaction_tax_cost').val(tax_cost);
// var total = tax_cost + sub_total;
// $('#transaction_total').val(total);
});

</script>


<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Component Code</label>
                            <input type="text" id="component_code" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location Code</label>
                            <input type="text" id="side" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Container No.</label>
                            <input type="text" id="modal_container_no" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Damage code</label>
                                    <select readonly class="form-control" id="damage_code">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Repair code</label>
                                    <select readonly class="form-control" id="repair_code">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Material Code code</label>
                                    <select readonly class="form-control" id="material_code">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="create_transaction">
                    <input type="hidden" id="tarrif_id">
                    <input type="hidden" id="labour_hr">
                    <input type="hidden" id="labour_cost">
                    <input type="hidden" id="material_cost">
                    <input type="hidden" id="sab_total">
                    <input type="hidden" id="gst">
                    <input type="hidden" id="total">
                    <input type="hidden" id="tax_cost">
                    <button type="button" class="btn btn-primary" onclick="createTransaction()">Add</button>
                </form>
                <div class="card mt-5">
                    <div class="card-body p-0">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Container No.</th>
                                    <th>Compoment Code</th>
                                    <th>Location Code</th>
                                    <th>Damage Code</th>
                                    <th>Repair code</th>
                                    <th>Material code</th>
                                    <th>UOM</th>
                                    <th>Width</th>
                                    <th>Length</th>
                                    <th>Height</th>
                                    <th>Quantity</th>
                                    <th>Labour Hr.</th>
                                    <th>Labour Cost</th>
                                    <th>Material Cost</th>
                                    <th>Sub Total</th>
                                    <th>GST</th>
                                    <th>Tax Cost</th>
                                    <th>Total Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                            </tbody>
                        </table>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection