@if(!empty($latest_pro))
@php
    $currency = \App\Models\Utility::GetValueByName('CURRENCY_NAME');
    $currency_icon = \App\Models\Utility::GetValueByName('CURRENCY');
@endphp

<div class="bg-sec">
    <img src="{{ asset('themes/'.APP_THEME().'/assets/images/product-back.jpg') }}" class="banner-img" alt="newsletter img">

    <div class="contnent">
        <div class="left-side-content">
            <div class="custom-output">
                @php
                    date_default_timezone_set('Asia/Kolkata');
                    $currentDateTime = \Carbon\Carbon::now();
                    $sale_product = \App\Models\FlashSale::where('theme_id', APP_THEME())
                        ->where('store_id', getCurrentStore())
                        ->where('is_active', 1)
                        ->get();
                    $latestSales = [];

                    foreach ($sale_product as $flashsale) {
                        $saleEnableArray = json_decode($flashsale->sale_product, true);
                        $startDate = \Carbon\Carbon::parse($flashsale->start_date . ' ' . $flashsale->start_time);
                        $endDate = \Carbon\Carbon::parse($flashsale->end_date . ' ' . $flashsale->end_time);

                        if ($endDate < $startDate) {
                            $endDate->addDay();
                        }
                        $currentDateTime->setTimezone($startDate->getTimezone());

                        if ($currentDateTime >= $startDate && $currentDateTime <= $endDate) {
                            if (is_array($saleEnableArray) && in_array($latest_pro->id, $saleEnableArray)) {
                                $latestSales[$latest_pro->id] = [
                                    'discount_type' => $flashsale->discount_type,
                                    'discount_amount' => $flashsale->discount_amount,
                                ];
                            }
                        }
                    }
                @endphp
                @foreach ($latestSales as $productId => $saleData)
                    <div class="badge">
                        @if ($saleData['discount_type'] == 'flat')
                            -{{ $saleData['discount_amount'] }}{{ $currency_icon }}
                        @elseif ($saleData['discount_type'] == 'percentage')
                            -{{ $saleData['discount_amount'] }}%
                        @endif
                    </div>
                @endforeach
            </div>
            <span class="subtitle">{{ __('TRENDING')}}</span>
            <h3>
                <a href="">
                    {{$latest_pro->name}}
                </a>
            </h3>

            <p>{{ $latest_pro->name }}</p>
            @if ($latest_pro->variant_product == 0)
                <div class="price">
                    <ins>{{$latest_pro->final_price}}<span class="currency-type">{{$currency}}</span></ins>
                </div>
            @else
                <div class="price">
                    <ins>{{ __('In Variant') }}</ins>
                </div>
            @endif
            <a href="{{route('page.product-list',$slug)}}" class="btn">
                {{ __('SHOP NOW')}}
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4605 6.00095C11.7371 5.72433 11.7371 5.27584 11.4605 4.99921L7.2105 0.749214C6.93388 0.472592 6.48539 0.472592 6.20877 0.749214C5.93215 1.02584 5.93215 1.47433 6.20877 1.75095L9.9579 5.50008L6.20877 9.24921C5.93215 9.52584 5.93215 9.97433 6.20877 10.2509C6.48539 10.5276 6.93388 10.5276 7.2105 10.2509L11.4605 6.00095ZM1.54384 10.2509L5.79384 6.00095C6.07046 5.72433 6.07046 5.27584 5.79384 4.99921L1.54384 0.749214C1.26721 0.472592 0.818723 0.472592 0.542102 0.749214C0.26548 1.02583 0.26548 1.47433 0.542102 1.75095L4.29123 5.50008L0.542101 9.24921C0.26548 9.52584 0.26548 9.97433 0.542101 10.2509C0.818722 10.5276 1.26721 10.5276 1.54384 10.2509Z" fill="white"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
@endif
