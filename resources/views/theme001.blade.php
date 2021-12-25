<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>{{ $license['title'] }}</title>
    <style type="text/css">
        .color-001{
            color: #f5f5f7;
        }
        .bg-001{
            background: rgba(0, 0, 0, 0.8);
        }
        .nav a{
            color: #ccc;
        }
        .nav a:hover{
            color:#fff;
        }
        .bg-002{
            background-color: #404040;
        }
    </style>
</head>
<body>
<header class="sticky-top">
    <nav class="bg-001">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#products">PRODUCTS</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">CONTACT</a>
            </li>
        </ul>
    </nav>
</header>
<!-- banner -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    </ol>

    <img src="{{ URL::asset('uploads/'.$license['banner']) }}" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">

        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- banner -->

    <!-- about -->
    <section class="container text-center pt-5 pb-5" id="about">
        @if (!empty($about))
        <h2>{{ $about['title'] }}</h2>
        <div>
            <p>{{ $about['content'] }}</p>
        </div>
        @else
            Not Data
        @endif
    </section>
    <!-- about -->

    <!-- products -->
    <section class="bg-light pt-5 pb-5" id="products">
        <div class="container">
            <h2 class="text-center">OUR PRODUCTS</h2>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-hat" role="tabpanel" aria-labelledby="pills-hat-tab">

                    <div class="row row-cols-1 row-cols-md-2" id="div1">
                        @if (!empty($goods))
                            @foreach ($goods as $item)
                        <div class="col mb-3">
                            <div class="card h-100 mt-2">
                                <img src="{{ URL::asset('uploads/'.$item['thumbnail']) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['title'] }}</h5>
                                    <p class="card-text">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @else
                            Not Data
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- products -->

    <section class="p-5">
        <div class="container px-5">
            <h2 class="text-center" id="contact">CONTACT US</h2>
            <form class="w-75 m-auto" method="post" action="link.php">
                <div class="form-group mt-5">
                    <input type="text" class="form-control col-form-label-lg" id="formGroupExampleInput" placeholder="your name" required>
                </div>
                <div class="form-group mt-5">
                    <input type="email" class="form-control col-form-label-lg" id="formGroupExampleInput2" placeholder="your mailbox" required>
                </div>
                <div class="form-group mt-5">
                    <textarea class="form-control col-form-label-lg" id="exampleFormControlTextarea1" rows="10" placeholder="message" required></textarea>
                </div>
                <div class="form-group mt-5 text-center">
                    <button type="submit" class="btn btn-dark px-5">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <footer class="py-3 bg-light">
        <div class="container">
            <p class="border-bottom"><small>Email: {{ $email['content'] }} | Address：{{ $license['address'] }}</small></p>
            <p><small>Copyright © 2021 {{ $license['title'] }}</small>
                @if (!empty($policy))
                    @foreach ($policy as $item)
                <a href="javascript:;" onclick="{{ $item['id'].'()' }}" class="ml-3" id="about">{{ $item['title'] }}</a>
                    @endforeach
                @else
                    Not Data
                @endif
            </p>
            <p></p>
        </div>

    </footer>

    @if (!empty($policy))
        @foreach ($policy as $item)
        <div id="{{ $item['id'] }}" style="display:none">
            <h4>{{ $item['title'] }}</h4>
            {{ $item['content'] }}
        </div>
        @endforeach
    @else
        <div id="box1" style="display:none">
            <h4>Not Data</h4>
            Not Data
        </div>
    @endif


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/layer/3.5.1/layer.js"></script>
    <script>
        @if (!empty($policy))
        @foreach ($policy as $item)
        function {{ $item['id'] }}(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"Shipping Policy",
                content: "{{ $item['content'] }}"
            });
        }
        @endforeach
        @endif

        function box2(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"Returns Policy",
                content: $('#box2').html()
            });
        }

        function box3(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"Platform Policy",
                content: $('#box3').html()
            });
        }

        function box4(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"Privacy Policy",
                content: $('#box4').html()
            });
        }
        function box5(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"Terms",
                content: $('#box5').html()
            });
        }
    </script>
</body>
</html>
