@extends('frontend.layouts.master')

@section('title','E-SHOP || Order Track Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <!-- <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Order Track</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Breadcrumbs -->
    <section class="tracking_box_area section_gap py-5">
        <div class="container">
            <div class="tracking_box_inner text-center">
                <h1><strong>Order Tracking</strong></h1>
                <p>Enter your tracking number here to see your order status.</p>
                <form class="row justify-content-center tracking_form my-4" action="{{ route('product.track.order') }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="col-md-2 form-group">
                    </div>
                    <div class="col-md-5 form-group">
                        <input type="text" class="form-control p-2" style="border-radius: 30px;" name="order_number" placeholder="Enter your order number">
                    </div>
                    <div class="col-md-3 form-group">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: black;border-radius: 30px;">Track Order</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection