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
    <img src="{{ URL::asset('uploads/'.$license['banner']) }}" class="d-block w-100" alt="...">
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
            @if (!empty($goodsCategory))
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                @foreach (array_unique($goodsCategory) as $item)
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $goodsCategory[0]['id'] == $item['id']?'active':'' }}" id="pills-{{ $item['id'] }}-tab" data-toggle="pill" href="#pills-{{ $item['id'] }}" role="tab" aria-controls="pills-{{ $item['id'] }}" aria-selected="{{ $goodsCategory[0]['id'] == $item['id']?'true':'' }}">{{ $item['title'] }}</a>
                </li>
                @endforeach
            </ul>
            @endif

            @if (!empty($goodsCategory))
            <div class="tab-content" id="pills-tabContent">
                @foreach (array_unique($goodsCategory) as $category)
                <div class="tab-pane fade {{ $goodsCategory[0]['id'] == $category['id']?'show active':'' }}" id="pills-{{ $category['id'] }}" role="tabpanel" aria-labelledby="pills-{{ $category['id'] }}-tab">

                    <div class="row row-cols-1 row-cols-md-2" id="div1">
                        @if (!empty($goods))
                            @foreach ($goods as $item)
                                @if ($item['category']['title']==$category['title'])
                                <div class="col mb-3">
                                    <div class="card h-100 mt-2">
                                        <img src="{{ URL::asset('uploads/'.$item['thumbnail']) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['title'] }}</h5>
                                            <h5 class="card-title">{{ $item['category']['title'] }}</h5>
                                            <p class="card-text">
                                                {{ $item['description'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @else
                            Not Data
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </section>
    <!-- products -->

    <section class="p-5">
        <div class="container px-5">
            <h2 class="text-center" id="contact">CONTACT US</h2>
            <form class="w-75 m-auto" method="get">
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
                <a href="javascript:;" onclick="{{ 'box'.$item['id'].'()' }}" class="ml-3" id="about">{{ $item['title'] }}</a>
                    @endforeach
                @else
                    Not Data
                @endif
            </p>
            <p></p>
        </div>

    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/layer/3.5.1/layer.js"></script>
    <script>
        @if (!empty($policy))
        @foreach ($policy as $item)
        function {{ 'box'.$item['id'] }}(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"{{ $item['title'] }}",
                content: "{{ $item['content'] }}"
            });
        }
        @endforeach
        @endif
    </script>
</body>
</html>
