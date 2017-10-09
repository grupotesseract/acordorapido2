<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('welcome.head')

    <body>
    	@include('welcome.nav')

		@yield('content')

        @include('welcome.footer')	
    </body>
</html>