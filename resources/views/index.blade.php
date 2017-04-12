@extends('layouts.master')

@section('padding', 'py-0')

@section('header')
    <div class="container-fluid" style="background-color: #75abeb;padding:110px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <form action="{{ url('jobs') }}" method="get">
                                <div class="row ">
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input name="search" type="text" class="form-control" placeholder="Escribe un puesto o área">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 flex flex-center">
                                        <button class="btn btn-primary btn-block" type="submit" style="height:38px;">
                                            <i class="material-icons">search</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if (count($users) > 4)
        <div class="container">
            <div class="row">
                <div class="col-sm-12 py-5">
                    <div class="w-100 slick-carousel text-nowrap" style="overflow-x:hidden;">
                        @foreach ($users as $user)
                            <div class="card m-3 d-inline-block">
                                <div class="card-block text-center">
                                    <img src="{{ asset($user->avatar) }}" alt="" class="img-fluid mx-auto" style="height:50px;" title="{{ $user->name }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.slick-carousel').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 1000
        });
    </script>
@endsection
