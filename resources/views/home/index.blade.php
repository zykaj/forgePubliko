@extends('layouts.master')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Publiko.al">
    <meta name="author" content="Skai Software Solutions">
    <meta name="generator" content="Skai V1.0">
    <title>Publiko.al</title>
    <link rel="shortcut icon" href="{{ imgUrl(config('settings.app.favicon'), 'favicon') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/kreu.css')}}" rel="stylesheet">
</head>
<body class="bgblu-dark">
<div class="main">
    <div class="row m-0">
        <div class="col-sm-12 col-md-6">
            <div class="col-12 p-4">
                <img src="{{asset('assets/img/logo-publiko.svg')}}" style="width:208px"/>
            </div>
            <div class="row">
                <div class="d-none d-lg-block col-lg-6 pl-0">
                    <img src="{{asset('assets/img/avatar.svg')}}"/>
                </div>
                <div class="d-none d-sm-block col-md-12 col-lg-6 pb-4" style="margin:auto; font-size:16px">
                    <span class="font-RelawayBlack color-white" style="font-size:100px;margin:0;line-height:.8">BLI &</span>
                    <span class="font-RelawayBlack color-green" style="font-size:100px;margin:0;line-height :.8">SHIT</span>
                    <p class="pt-4 color-white font-RelawayMedium">
                        Në <span class="color-green">Publiko.al</span>
                        mund të blesh dhe shesësh në të gjitha kategoritë e mëposhtme si automjete, prona, pajisje elektronike, materiale profesionale, artikuj sportiv si edhe vënde pune.</p>
                    <a href="#pershkrim">
                        <button class="btn-meshume font-RelawayMedium">Më Shumë</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 bgwhite">
            <div class="p-4" style="text-align: center">
                @if (!auth()->check())
                        <a href="{{ url('register') }}" class="btn-regjistrohu"><i class="icon-user-add fa"></i> {{ t('register') }}</a>

                        @if (config('settings.security.login_open_in_modal'))
                            <a href="#quickLogin" class="btn-login" data-toggle="modal"><i class="icon-user fa"></i> {{ t('log_in') }}</a>
                        @else
                            <a href="{{ url('login') }}" class="btn-login"><i class="icon-user fa"></i> {{ t('log_in') }}</a>
                        @endif
                @else
                        <span class="font-RelawayMedium color-bluDark">Mirësevini </span>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user fa hidden-sm"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <ul id="userMenuDropdown" class="dropdown-menu user-menu dropdown-menu-right shadow-sm">
                            <li class="dropdown-item active">
                                <a href="{{ url('account') }}">
                                    <i class="icon-home"></i> {{ t('Personal Home') }}
                                </a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('account/my-posts') }}"><i class="icon-th-thumb"></i> {{ t('my_ads') }} </a></li>
                            <li class="dropdown-item"><a href="{{ url('account/favourite') }}"><i class="icon-heart"></i> {{ t('favourite_ads') }} </a></li>
                            <li class="dropdown-item"><a href="{{ url('account/saved-search') }}"><i class="icon-star-circled"></i> {{ t('Saved searches') }} </a></li>
                            <li class="dropdown-item"><a href="{{ url('account/pending-approval') }}"><i class="icon-hourglass"></i> {{ t('pending_approval') }} </a></li>
                            <li class="dropdown-item"><a href="{{ url('account/archived') }}"><i class="icon-folder-close"></i> {{ t('archived_ads') }}</a></li>
                            <li class="dropdown-item">
                                <a href="{{ url('account/conversations') }}">
                                    <i class="icon-mail-1"></i> {{ t('Conversations') }}
                                    <span class="badge badge-pill badge-important count-conversations-with-new-messages">0</span>
                                </a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('account/transactions') }}"><i class="icon-money"></i> {{ t('Transactions') }}</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">
                                @if (app('impersonate')->isImpersonating())
                                    <a href="{{ route('impersonate.leave') }}"><i class="icon-logout"></i> {{ t('Leave') }}</a>
                                @else
                                    <a href="{{ url('logout') }}"><i class="icon-logout"></i> {{ t('log_out') }}</a>
                                @endif
                            </li>
                        </ul>
                @endif

                <h1 class="color-bluDark pt-5 pb-3" style="font-size:40px; font-weight:500;line-height: 45px;">Çfarë jeni duke kërkuar?</h1>
                <div class="col-sm-12 col-md-10 col-xl-10" style="margin: auto; font-size:16px">
                    <div class="row">
                        <div class="col-6 col-md-4 p-2">
                            <a href="/category/automjete-sq">
                            <div class="automjete" style="margin:auto;"></div>
                            </a>
                            <p class="color-bluDark">Automjete</p>
                        </div>
                        <div class="col-6 col-md-4 p-2">
                            <a href="">
                            <div class="prona" style="margin:auto;"></div>
                            </a>
                            <p class="color-bluDark">Prona</p>
                        </div>
                        <div class="col-6 col-md-4 p-2">
                            <a href="">
                            <div class="vendepune" style="margin:auto;"></div>
                            </a>
                            <p class="color-bluDark">Vënde Pune</p>
                        </div>
                        <div class="col-6 col-md-4 p-2">
                            <a href="">
                            <div class="elektronike" style="margin:auto;"></div>
                            </a>
                            <p class="color-bluDark">Elektronike</p>
                        </div>
                        <div class="col-6 col-md-4 p-2">
                            <a href="">
                            <div class="sportive" style="margin:auto;"></div>
                            </a>
                            <p class="color-bluDark">Artikuj Sportiv</p>
                        </div>
                        <div class="col-6 col-md-4 p-2">
                            <a href="">
                            <div class="veglapune" style="margin:auto;"></div>
                            </a>
                            <p class="color-bluDark">Materiale <br> Profesionale</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-4 pb-4">
                    @if (!auth()->check() and config('settings.single.guests_can_post_ads') != '1')
                        <a class="" href="#quickLogin" data-toggle="modal">
                            <button class="btn-publiko">Publikoni Njoftimin Tuaj <i class="fa fa-plus-circle"></i></button>
                        </a>
                    @else
                        <a class="pl-4 pr-4" href="{{ \App\Helpers\UrlGen::addPost() }}" style="text-transform: none;">
                            <button class="btn-publiko">Publikoni Njoftimin Tuaj <i class="fa fa-plus-circle"></i></button>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div id="pershkrim" class="row bg-white m-0">
        <div class="col-12 m-0 p-0">
            <div class="col-6 m-0 p-0">
                <img src="{{asset('assets/img/element1.svg')}}" style="width: 70%" />
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-6 pl-0" style="margin: auto; padding-bottom: 100px;">
                    <div class="col-12 pt-5" style="margin:auto;display:flex;">
                        <div class="col-8">
                            <div class="color-bluDark font-RelawayBlack" style="font-size:120px;display:inline;line-height: 85px">
                                1
                            </div>
                            <div class="font-RelawayBlack" style="font-size:35px;display:inline;line-height:.8;">
                              <span class="pl-2" style="position: absolute;bottom: 0px">
                                 <p class="m-0 color-bluLight" style="line-height:.8;">KËRKO</p>
                                 <p class="m-0 color-green" style="line-height:.8;">KATEGORINË</p>
                              </span>
                            </div>
                        </div>
                        <div class="col-4" style="display:inline;">
                            <img src="{{asset('assets/img/loop.svg')}}" style="height:85px;position:absolute;bottom:0px;"/>
                        </div>
                    </div>
                    <div class="col-12 pt-5" style="margin:auto;display:flex;">
                        <div class="col-8">
                            <div class="color-bluDark font-RelawayBlack" style="font-size:120px;display:inline;line-height: 85px">
                                2
                            </div>
                            <div class="font-RelawayBlack" style="font-size:35px;display:inline;line-height:.8;">
                              <span class="pl-2" style="position: absolute;bottom: 0px">
                                 <p class="m-0 color-bluLight" style="line-height:.8;">ZGJIDH</p>
                                 <p class="m-0 color-green" style="line-height:.8;">PRODUKTIN</p>
                              </span>
                            </div>
                        </div>
                        <div class="col-4" style="display:inline;">
                            <img src="{{asset('assets/img/mobile.svg')}}" style="height:85px;position:absolute;bottom:0px;"/>
                        </div>
                    </div>
                    <div class="col-12 pt-5" style="margin:auto;display:flex;">
                        <div class="col-8">
                            <div class="color-bluDark font-RelawayBlack" style="font-size:120px;display:inline;line-height: 85px">
                                3
                            </div>
                            <div class="font-RelawayBlack" style="font-size:35px;display:inline;line-height:.8;">
                              <span class="pl-2" style="position: absolute;bottom: 0px">
                                 <p class="m-0 color-bluLight" style="line-height:.8;">BLI /</p>
                                 <p class="m-0 color-green" style="line-height:.8;">KONTAKTO</p>
                              </span>
                            </div>
                        </div>
                        <div class="col-4" style="display:inline;">
                            <img src="{{asset('assets/img/creditcard.svg')}}" style="height:75px;position:absolute;bottom:0px;"/>
                        </div>
                    </div>
                    <div class="col-12 pt-5" style="margin:auto;display:flex;">
                        <div class="col-8">
                            <div class="color-bluDark font-RelawayBlack" style="font-size:120px;display:inline;line-height: 85px">
                                4
                            </div>
                            <div class="font-RelawayBlack" style="font-size:35px;display:inline;line-height:.8;">
                              <span class="pl-2" style="position: absolute;bottom: 0px">
                                 <p class="m-0 color-bluLight" style="line-height:.8;">DITË TË</p>
                                 <p class="m-0 color-green" style="line-height:.8;">KENDSHME!</p>
                              </span>
                            </div>
                        </div>
                        <div class="col-4" style="display:inline;">
                            <img src="{{asset('assets/img/giftbox.svg')}}" style="height:90px;position:absolute;bottom:0px;"/>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6 pr-0">
                    <div class="col-11" style="margin:auto;padding-top:100px">
                        <img src="{{asset('assets/img/element3.svg')}}" style="width: 200px"/>
                        <p class="pt-3 font-RelawayMedium color-bluDark" style="font-size:16px">
                            Publiko.al ka në vizionin e saj ofrimin e një shërbimi sa më profesional për këdo që kërkon të blej apo të shes në kategorite e saj. Me risinë që i mungon tregut vendas, ne kemi përshatur çdo kërkese që ti ofrojmë secilit nga ju një shërbim sa më cilesor por gjithashtu shumë të thjeshtë në përdorim. Gjithcka është bërë e personalizuar për secilën kategori, dhe si bleresi dhe shitësi mund të kërkojne cdo produkt me detaje dhe shume thjesht. Ne ju asistojme që çdo produkt i juaj të arrije tek bleresi sa më shpejte, duke ndjekur çdo postim me përparsi dhe shpërndarjen e saj në çdo platformë sociale te publiko.al disponon.
                            <br><br>
                            Industria e Shit/Blerjes në Shqiperi është e tej mbushur me shërbime të cilat nuk janë të pershatura tregut vendas duke bërë keshtu nevojen e krijimit të një platforme unike si e jona.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 m-0 p-0">
            <div class="col-6 m-0 p-0" style="float:right;">
                <img class="pt-5" src="{{asset('assets/img/element4.svg')}}" style="width:70%;float:right;"/>
            </div>
        </div>
    </div>
    <div class="row m-0">
        <img class="pt-0" src="{{asset('assets/img/ovalup.svg')}}" style="width:200px; position:relative; top:-52px; margin:auto"/>
    </div>
    
</div>
</body>
</html>
@includeWhen(!auth()->check(), 'layouts.inc.modal.login')

{{--
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) Skai - Software Solution All Rights Reserved
 *
 * Website: https://publiko.al
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
--}}
@section('after_scripts')
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script>
		@if (config('settings.optimization.lazy_loading_activation') == 1)
		$(document).ready(function () {
			$('#postsList').each(function () {
				var $masonry = $(this);
				var update = function () {
					$.fn.matchHeight._update();
				};
				$('.item-list', $masonry).matchHeight();
				this.addEventListener('load', update, true);
			});
		});
		@endif
	</script>
    <script>
        $(document).ready(function () {
            {{-- Select Boxes --}}
            $('.selecter').select2({
                language: langLayout.select2,
                dropdownAutoWidth: 'true',
                minimumResultsForSearch: Infinity,
                width: '100%'
            });

            {{-- Searchable Select Boxes --}}
            $('.sselecter').select2({
                language: langLayout.select2,
                dropdownAutoWidth: 'true',
                width: '100%'
            });

            {{-- Social Share --}}
            $('.share').ShareLink({
                title: '{{ addslashes(Meta::get('title')) }}',
                text: '{!! addslashes(Meta::get('title')) !!}',
                url: '{!! request()->fullUrl() !!}',
                width: 640,
                height: 480
            });

            {{-- Modal Login --}}
            @if (isset($errors) and $errors->any())
            @if ($errors->any() and old('quickLoginForm')=='1')
            $('#quickLogin').modal();
            @endif
            @endif
        });
    </script>

@endsection
