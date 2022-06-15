@extends('layout.layout')
@section('title', 'OrganicFood')
@section('content')
<nav class="container">
    <div class="bg-white ">
        <div class="row">
            <div class="col-sm-3">
            <div class="subnav-header">
                        <button class="subnavbtn" disabled><i class="fa fa-bars"></i> List of products</button>
                    </div>
                <div class="navbar-list">
                   
                    <div class="subnav">
                        <button class="subnavbtn">Vegetable<i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#company">Organic leafy vegetables</a>
                            <a href="#team">Organic fruits and vegetables</a>
                            <a href="#careers">Fresh Mushrooms</a>
                        </div>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Fresh food<i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#bring">Organic Pork</a>
                            <a href="#deliver">Organic beef</a>
                            <a href="#package">Poultry - Eggs</a>
                            <a href="#express">Fish and Seafood</a>
                            <a href="#express">Dry and a sunny</a>
                        </div>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Dry food <i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#link1">Organic nuts</a>
                            <a href="#link2">Organic cereals</a>
                            <a href="#link3">Organic rice</a>
                            <a href="#link4">Organic noodles and noodles</a>
                            <a href="#link1">Confectionery and chocolate</a>
                            <a href="#link2">Other dry goods</a>
                            <a href="#link3">Baking material</a>
                        </div>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Convenience food</button>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Organic fruit <i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#link1">Vietnamese fruit</a>
                            <a href="#link2">Imported fruit</a>
                            <a href="#link3">Dried fruit - Frozen</a>
                        </div>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Spices and ingredients <i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#link1">Spice</a>
                            <a href="#link2">Materials</a>
                            <a href="#link3">honey</a>
                        </div>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Organic drinks <i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#link1">Organic tea</a>
                            <a href="#link2">Organic coffee</a>
                            <a href="#link3">Organic juices</a>
                        </div>
                    </div>
                    <div class="subnav">
                        <button class="subnavbtn">Butter - Milk <i class="fa fa-caret-square-o-right"></i></button>
                        <div class="subnav-content">
                            <a href="#link1">Nut milk</a>
                            <a href="#link2">Fresh milk</a>
                            <a href="#link3">Yogurt</a>
                            <a href="#link1">Butter and Cheese</a>
                            <a href="#link2">Condensed milk</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-9">

                <div style="border-radius: 15px;" id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{asset('img/carousel1.jpg')}}" alt="" style="width:100%; height:348px; border-radius: 15px;">
                        </div>

                        <div class="item">
                            <img src="{{asset('img/carousel2.jpg')}}" alt="" style="width:100%; height:348px; border-radius: 15px;">
                        </div>

                        <div class="item">
                            <img src="{{asset('img/carousel3.jpg')}}" alt="" style="width:100%; height:348px; border-radius: 15px;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a style="border-radius: 15px;" class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a style="border-radius: 15px;" class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
    </div>

</nav><br>

    <!-- <br><br><div style="border-top: 1px solid; border-color:#828282;"></div> -->

<div class="container">
    <div class="img-main-mid-home">
    <div class="img-mid-home">
        <img class="hover-img" src="{{asset('img/raucuqua.jpg')}}"  alt=""><br>
        <span>Vegetable</span>
    </div>
    <div class="img-mid-home">
        <img class="hover-img" src="{{asset('img/raucuqua.jpg')}}"  alt=""><br>
        <span>Vegetable</span>
    </div>
    <div class="img-mid-home">
        <img class="hover-img" src="{{asset('img/raucuqua.jpg')}}"  alt=""><br>
        <span>Vegetable</span>
    </div>
    <div class="img-mid-home">
        <img class="hover-img" src="{{asset('img/raucuqua.jpg')}}"  alt=""><br>
        <span>Vegetable</span>
    </div>
    <div class="img-mid-home">
        <img class="hover-img" src="{{asset('img/raucuqua.jpg')}}"  alt=""><br>
        <span>Vegetable</span>
    </div>
    <div class="img-mid-home">
        <img class="hover-img" src="{{asset('img/raucuqua.jpg')}}"  alt=""><br>
        <span>Vegetable</span>
    </div>
    </div>
</div><br><br>

<!-- <br><br><div style="border-top: 1px solid; border-color:#828282;"></div> -->

<div class="container">
    <div class="bg-white">

    </div>
</div>
@endsection
@section('script-section')


@endsection