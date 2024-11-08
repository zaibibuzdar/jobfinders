@extends('frontend.layouts.app')

@section('title', '503')

@section('main')
    <section class="rt-error">
        <div class="container">
            <div class="row  align-items-center">
                <div class="rt-spacer-100 rt-spacer-md-50"></div>
                <div class="rt-spacer-50 rt-spacer-md-0"></div>
                <div class="col-xl-6 col-lg-6 order-1 order-lg-0">
                    <div class="rt-error-left">
                        <h4 class="rt-mb-24">{{ __('service_unavailable') }}</h4>
                        <div class="body-font-2 ft-wt-5 text-gray-500 rt-mb-24 max-width-408">
                            {{ __('something_went_wrong_it_look_like_the_server_is_unavailable_and_the_visitor_bot_or_human') }}
                        </div>
                        <div class="error-button d-flex">
                            <div class="me-3">
                                <a href="{{ route('website.home') }}" class="btn btn-primary">
                                    <span class="button-content-wrapper ">
                                        <span class="button-icon align-icon-right">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 12H19" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                        <span class="button-text">
                                            {{ __('home') }}
                                        </span>
                                    </span>
                                </a>
                            </div>
                            <div>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                                    {{ __('go_back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 order-0 order-lg-1">
                    <div class="rt-error-right">
                        <img src="{{ asset($cms_setting->page503_image) }}" class="img-fluid" alt="error-banner">
                    </div>
                </div>
            </div>
        </div>
        <div class="rt-spacer-100 rt-spacer-md-50"></div>
        <div class="rt-spacer-50 rt-spacer-md-0"></div>
    </section>
@endsection
