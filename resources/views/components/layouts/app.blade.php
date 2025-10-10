<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>

<x-navbar/>

<div class="text-end p-3">
    <select onchange="window.location.href=this.value" class="form-select d-inline w-auto">
        <option value="{{ url('/language/en') }}" @selected(app()->getLocale() === 'en')>English</option>
        <option value="{{ url('/language/nl') }}" @selected(app()->getLocale() === 'nl')>Nederlands</option>
        <option value="https://www.youtube.com/shorts/qS2NiquFcGY" target="_blank">中國人</option>
    </select>
</div>




<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <x-header/>

            <ul class="breadcrumb">
                <li><a href="/" title="{{ __('misc.home_alt') }}"
                       alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                {{ $breadcrumb ?? '' }}
            </ul>

            @if ( isset($_GET['q']) )
                <x-search_results/>
            @else
                {{ $slot }}
            @endif

            <ul class="breadcrumb">
                <li>
					<a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
				</li>
                {{ $breadcrumb ?? '' }}
            </ul>

        </div>

        <div class="row">
            <x-footer/>
        </div>

    </div>


</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
