@extends('layouts.layouts')

@section('page-title')
{{ __('Article') }}
@endsection

@section('content')

@foreach ($blogs as $blog)
    @php
        $sub = explode(',',$blog->subcategory_id);
    @endphp
<div class="wrapper wrapper-top">
    <section class="blog-page-banner article-page-banner common-banner-section" style="background-image: url({{asset('themes/'.APP_THEME().'/assets/images/banner-inner.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-12">
                    <div class="common-banner-content text-center">
                        <a href="{{route('page.blog',$slug)}}" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                </svg>
                            </span>
                            {{  __('Back to Blog') }}
                        </a>
                        <div class="section-title">
                            <h2>{{$blog->title}}</h2>
                        </div>
                        @php
                            $store = App\Models\Store::find($blog->store_id);
                            $user = App\Models\Admin::find($store->created_by);
                        @endphp
                        <div class="about-user d-flex align-items-center">
                            <div class="abt-user-img">
                                <img src="{{asset('themes/'.APP_THEME().'/assets/images/john-2.png')}}" alt="profile">
                            </div>
                            <h6>
                                <span>{{ $user->name }},</span>
                                 {{-- {{ __('company.com') }} --}}
                            </h6>
                            <div class="post-lbl"><b> {{ __('Category') }} :</b> {{$blog->MainCategory->name}}</div>
                            <div class="post-lbl"><b> {{ __('Date') }}:</b> {{$blog->created_at->format('d M, Y ')}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    <section class="article-section padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="aticleleftbar">
                        {!! html_entity_decode($blog->content) !!}

                        @php
                            $homepage_footer_10_icon = $homepage_footer_10_link = '';

                            $homepage_footer_10 = array_search('homepage-footer-10', array_column($homepage_json, 'unique_section_slug'));
                            if($homepage_footer_10 != '') {
                                $homepage_footer_section_10 = $homepage_json[$homepage_footer_10];
                            }
                        @endphp
                        <ul class="article-socials d-flex align-items-center mt-2">
                            <li><span> {{ __('Share') }} :</span></li>
                            @for($i=0 ; $i < $homepage_footer_section_10['loop_number'];$i++)
                                @php
                                    foreach ($homepage_footer_section_10['inner-list'] as $homepage_footer_section_10_value)
                                    {
                                        if($homepage_footer_section_10_value['field_slug'] == 'homepage-footer-social-icon') {
                                        $homepage_footer_10_icon = $homepage_footer_section_10_value['field_default_text'];
                                        }
                                        if($homepage_footer_section_10_value['field_slug'] == 'homepage-footer-link') {
                                        $homepage_footer_10_link = $homepage_footer_section_10_value['field_default_text'];
                                        }

                                        if(!empty($homepage_footer_section_10[$homepage_footer_section_10_value['field_slug']]))
                                        {
                                            if($homepage_footer_section_10_value['field_slug'] == 'homepage-footer-social-icon'){
                                            $homepage_footer_10_icon = $homepage_footer_section_10[$homepage_footer_section_10_value['field_slug']][$i]['field_prev_text'];
                                        }
                                        }
                                        if(!empty($homepage_footer_section_10[$homepage_footer_section_10_value['field_slug']]))
                                        {
                                            if($homepage_footer_section_10_value['field_slug'] == 'homepage-footer-link'){
                                            $homepage_footer_10_link = $homepage_footer_section_10[$homepage_footer_section_10_value['field_slug']][$i];
                                        }
                                        }
                                    }
                                @endphp
                                <li>
                                    <a target="_blank"  href="{!! $homepage_footer_10_link !!}">
                                        <img src="{{get_file('/' . $homepage_footer_10_icon)}}" alt="social-icon">
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="articlerightbar blog-grid-section article-section-home">
                        <div class="section-title">
                            <h3> {{ __('Related articles') }} </h3>
                        </div>
                        @foreach ($datas->take(2) as $data)
                        @php
                            $b_id = hashidsencode($data->id);
                        @endphp
                            <div class="blog-itm">
                                <div class="blog-inner">
                                    <div class="blog-img">
                                        <a href="{{route('page.article',[$slug,$b_id])}}">
                                            <img src="{{get_file($data->cover_image_path , APP_THEME())}}" alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="{{route('page.article',[$slug,$b_id])}}">{{$data->title}}</b></a> </h4>
                                        <p>{{$data->short_description}}</p>
                                        <a href="{{route('page.article',[$slug,$b_id])}}" class="btn-secondary">
                                            {{ __('Read more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-section-home padding-top">
        <div class="container">
            <div class="common-title d-flex align-items-center justify-content-between">
                <div class="section-title">
                    <h2> {{ __('From our blog') }} </h2>
                </div>
                <a href="{{route('page.blog',$slug)}}" class="btn-secondary">
                    {{ __('Read more') }}
                </a>
            </div>
            <div class="blog-slider">
                @foreach ($l_articles as $article)
                @php
                    $b_id = hashidsencode($article->id);
                @endphp
                    <div class="blog-itm">
                        <div class="blog-inner">
                            <div class="blog-img">
                                <a href="{{route('page.article',[$slug,$b_id])}}">
                                    <img src="{{get_file($article->cover_image_path , APP_THEME())}}" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h4><a href="{{route('page.article',[$slug,$b_id])}}">{{$article->title}}</a> </h4>
                                <p>{{$article->short_description}} </p>
                                <a href="{{route('page.article',[$slug,$b_id])}}" class="btn-secondary">
                                    {{ __('Read more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</div>
@endforeach

@endsection
