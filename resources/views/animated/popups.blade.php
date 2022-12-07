

@if(count($errors) > 0)
<div class="messagewrapper">
@foreach($errors->all() as $error)
    <div class="alert-box error"><i class="fa fa-warning"></i> {{ $error }}</div>
@endforeach
</div>
<script>$(window).on("load", function () {$( "div.error" ).fadeIn(200 ).delay(1200).fadeOut( 4000 );});</script>
@endif


@if(Session::get('notes'))
<div class="messagewrapper"><div class="alert-box check"><i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('notes') }}</div></div>
<script>$(window).on("load", function () {$( "div.check" ).fadeIn(200 ).delay(1200).fadeOut( 4000 );});</script>
@endif


@if(Session::get('checknotes'))
<div class="messagewrapper"><div class="alert-box error"><i class="fa fa-warning" aria-hidden="true"></i> {{ Session::get('checknotes') }}</div></div>
<script>$(window).on("load", function () {$( "div.error" ).fadeIn(200 ).delay(1200).fadeOut( 4000 );});</script>
@endif


<div class="messagewrapper" id="process"><div class="alert-box check process"><i class="fa fa-warning" aria-hidden="true"></i> Processing...</div></div>


<script>
$("#process").hide();
$("#evalposted").hide();
</script>