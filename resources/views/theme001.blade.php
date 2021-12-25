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
                <a href="javascript:;" onclick="box1()" class="ml-3" id="about">{{ $item['title'] }}</a>
                    @endforeach
                @else
                    Not Data
                @endif
            </p>
            <p></p>
        </div>

    </footer>


    <div id="box1" style="display:none">
        <h4>Contactless Delivery</h4>
        To help ensure the health and safety of our customers, our team, and the broader community we’ve introduced Contactless Delivery as our default delivery option. Contactless Delivery means:

        We’ll deliver your item(s) to the front door of your house or apartment
        We’ll knock/buzz, and will greet you at your door while maintaining a six-foot social distance
        Your signature won’t be required — our team will simply photograph your order at your doorstep as proof of delivery
        Some multi-tenant buildings are restricting access to non-residents. We’re supportive of these measures, and in these cases our delivery team will deliver to the closest point to your home that they’re safely able to.

        Contactless Delivery is a flat $49, regardless of how much you order or the size of your pieces. Whether you’re ordering a single chair or an entire living room set, shipping is the same low price.

        We’ll throw it in for free on orders $999 (before tax) and over**.

        This rate applies to our standard service area, which includes the vast majority of US and Canadian ZIP/postal codes.

        In-Room and Assembly Services

        We’ve temporarily disabled in-room and assembly delivery options to ensure we can maintain a social distance during your delivery.

        **Please note that flat rate shipping, free shipping, and other discounts do not apply outside of Article’s standard delivery area. Free shipping for orders $999+ is not applicable to trade or business purchases; regular rates apply.
    </div>
    <div id="box2" style="display:none">
        <strong>Please contact our Customer service at lisnvladilen6@gmail.com to get the return address.</strong><br><br>


        <p><strong>Cancellation</strong><br>
            We accept order cancellation before the product is shipped or produced. If the order is cancelled you will get full refund. We cannot cancel the order if the product is already shipped out. </p><p>

        </p><p><strong>Returns (if applicable)</strong><br>
            We accept return of products. Customers have the right to apply for a return within 14 days after the receipt of the product.
            To be eligible for a return, your item must be unused and in the same condition that you received it. It must also be in the original packaging. To complete your return, we require a receipt or proof of purchase. Please do not send your purchase back to the manufacturer.
            Customers will only be charged once at most for shipping costs (this includes returns); No restocking fee to be charged to the consumers for the return of a product.</p>


        <p><strong>Refunds (if applicable)</strong><br>
            Once your return is received and inspected, we will email you a notification of receipt. We will also notify you of the approval or rejection of your refund. If you are approved, then your refund will be processed, and a credit will automatically be applied to your credit card or original method of payment, within a certain amount of days.</p>

        Late or missing refunds (if applicable)

        If you haven’t received a refund yet, first check your bank account again.
        Then contact your credit card company, it may take some time before your refund is officially posted. Next contact your bank. There is often some processing time before a refund is posted. If you’ve done all of this and you still have not received your refund, please contact us at lisnvladilen6@gmail.com

    </div>
    <div id="box3" style="display:none">
        The effective date of this Terms of Use Agreement ("Agreement") is October 22, 2020. This version of the Agreement of use replaces and supersedes any prior terms of use applicable to this site. This site is owned by hui-tong.online. We,hui-tong.online, and our affiliates and third-party agents, provide this site and related services to you, the user of this site, only for your personal, non-commercial use and subject to your acceptance of and compliance with this Agreement. Please read the terms contained herein carefully before using this site and/or the services associated therewith. Your use of this site and the associated services confirms your unconditional acceptance of these terms and conditions. If you do not accept these terms and conditions, do not use this site.

    </div>
    <div id="box4" style="display:none">
        This Policy describes how hui-tong.online of America Inc., including all direct and indirect subsidiaries (collectively “hui-tong.online,” “we,” “our,” or “us”), collect, use, and disclose information through our websites located at www.hui-tong.online and any other websites that link to this Policy (collectively “Sites”) and certain other services as described below. Other hui-tong.online websites, products, and services may have their own privacy policies. This Policy applies to our U.S. Sites and services that link to this Policy. HOW WE COLLECT THE INFORMATION When using our Sites or our services, you may provide us with your personal information through a variety of methods, including the following: (1) via signups on our Sites, such as through the creation of an account; (2) from an online, email, retail, fax, or telephone purchase; (3) when you enter a sweepstakes, giveaway, contest, or other promotion, or complete a survey; (4) when you provide information at our stores; (5) upon contacting us, such as through customer service communications, including our online chat features; (6) upon signing up at an event; (7) upon registering a hui-tong.online product; (8) when you submit a business reply, product, or warranty card; (9) when you post material to the Sites, such as through product reviews; or (10) when you interact with us for any other purpose. Information that you provide through the Sites can be combined with the information that we collect from you in any other way. We may also collect certain information automatically when you use the Sites, as described below. We may receive information about you from third parties and combine it with information you have provided to us.
    </div>
    <div id="box5" style="display:none">
        Terms of Service Welcome to the www.hui-tong.online ("hui-tong.online") website. The following Terms of Service govern your use of this website. If you visit or shop at hui-tong.online, you accept these conditions, so please read them carefully. Privacy Please review our Privacy Policy, which also governs your visit to hui-tong.online, to understand our privacy-related practices. No Professional Advice Any information supplied through this website or by any of our employees or agents, whether by telephone, e-mail, letter, facsimile or other form of communication, is for informational purposes or general guidance and does not constitute medical or other professional advice. Health-related information provided through this website is not a substitute for medical advice and it is important that you not make medical decisions without first consulting your personal physician or other healthcare professional. The receipt of any questions or feedback you submit to us does not create a professional relationship and does not create any privacy interests other than those described in our Privacy Policy. Electronic Communications When you visit hui-tong.online or send e-mails to us, you are communicating with us electronically and are consenting to receive communications from us electronically regarding a purchase or response to a question or comment or because you have chosen to receive promotional, legal or reminder emails about your glasses. We will communicate with you by e-mail or by posting notices on this website. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="layer/layer.js"></script>
    <script>
        function box1(){
            layer.open({
                type: 1,
                skin: 'layui-layer-rim', //加上边框
                area: ['500px', '500px'], //宽高
                title:"Shipping Policy",
                content: $('#box1').html()
            });
        }

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
