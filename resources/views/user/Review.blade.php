@extends('layout.user')
@section('content')    

<style>
    .contain{
        width: 100%;
        /* background-color: #111; */
        padding: 20px 30px;
        border: 1px solid #CCC;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .star-widget input{
        display: none;
    }

    .star-widget label{
        font-size: 40px;
        color: #CCC;
        padding: 10px;
        float: right;
        transition: all 0.2s ease;
    }

    input:not(:checked) ~ label:hover,
    input:not(:checked) ~ label:hover ~ label{
        color: #fe7;
    }

    input:checked ~ label{
        color: #fd4;
        /* text-shadow: 0 0 5px #952; */
    }
    #rate-1:checked ~  header::before{
        content: "Very Bad";
    }
    #rate-2:checked ~  header::before{
        content: "Bad";
    }
    #rate-3:checked ~  header::before{
        content: "Neutral";
    }
    #rate-4:checked ~  header::before{
        content: "Good";
    }
    #rate-5:checked ~  .contain header::before{
        content: "Very Good";
    }

    .contain header{
        width: 100%;
        font-size: 25px;
        color:#fe7;
        font-weight: 500;
        margin: 5px 0 20px 0;
        text-align: center;
        transition: all 0.2s ease;
    }


</style>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-primary px-3">Review</h6>
                <h1 class="display-6 mb-4"> Please write your Review</h1>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    
            <form method="POST" action="{{ route('review.update',['id'=>$job->id]) }}">
                @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="contain">
                                <label for="message" class="text-start me-auto">Rate</label>
                                    <div class="star-widget text-center">
                                        <input type="radio" name="rate" value="5"  id="rate-5">
                                        <label for="rate-5" class="fa-solid fa-star"></label>
                                        <input type="radio" name="rate" value="4" id="rate-4">
                                        <label for="rate-4" class="fa-solid fa-star"></label>
                                        <input type="radio" name="rate" value="3" id="rate-3">
                                        <label for="rate-3" class="fa-solid fa-star"></label>
                                        <input type="radio" name="rate" value="2" id="rate-2">
                                        <label for="rate-2" class="fa-solid fa-star"></label>
                                        <input type="radio" name="rate" value="1" id="rate-1">
                                        <label for="rate-1" class="fa-solid fa-star"></label>
                                    </div>
                                    {{-- <header></header> --}}
                                </div>
                                {{-- <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="rate" placeholder="Rate" value="">
                                    <label for="name">Rate</label>

                                </div> --}}
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="review" style="height: 200px">{{ old('message') }}</textarea>
                                    <label for="message">Review</label>

                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn rounded-pill py-3 px-5 text-white" style="background-color: #008dde" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <!-- Contact End -->
@endsection
