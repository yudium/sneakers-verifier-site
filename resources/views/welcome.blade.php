@extends('layouts.app')
@section('title', 'Welcome to Snoort')
@section('content')
<div>
    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
    			<h1 class="ctn-main-font ctn-min-color ctn-big">
    				Hi there I'm Snoort.
    			</h1>
    			<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
    				I can help you to check an original sneakers.
    			</p>
    			<!--
    			<p class="ctn-main-font ctn-min-color ctn-20px padding-10px">
    				Let's get started.
    			</p>
    			<div>
    				<a href="{{ url('/login') }}">
						<button class="btn btn-primary-color" style="margin-right: 10px;">
			    			Login
			    		</button>
			    	</a>
			    	<a href="{{ url('/register') }}">
			    		<button class="btn btn-main-color">
			    			Register
			    		</button>
			    	</a>
    			</div>
    		-->
    		</div>
    	</div>
    </div>

    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
	    		<h1 class="ctn-main-font ctn-min-color ctn-big">
	   				How this is works?
	    		</h1>
	    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    			We check your sneakers with our professional verificators that have been sertificated.
	    		</p>
	    	</div>
    	</div>
    </div>

    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
	    		<h1 class="ctn-main-font ctn-min-color ctn-big">
	   				Is it easy to use?
	    		</h1>
	    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    			Ya, you just send me some pictures or links of your sneakers, and we would check your sneakers.
	    		</p>
	    	</div>
    	</div>
    </div>

    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
	    		<h1 class="ctn-main-font ctn-min-color ctn-big">
	   				Is it trusted?
	    		</h1>
	    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    			Ofcourse, there are more then hundred verificators and online shops that work with us. So, you do not be affraid because it will be trusted.
	    		</p>
	    	</div>
    	</div>
    </div>

    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
	    		<h1 class="ctn-main-font ctn-min-color ctn-big">
	   				What would you get?
	    		</h1>
	    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    			We will save your time and money. You can get original sneakers that has been checked by our proffesional verificators.
	    		</p>
	    	</div>
    	</div>
    </div>

    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
	    		<h1 class="ctn-main-font ctn-min-color ctn-big">
	   				And it's all free for you
	    		</h1>
	    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    			We do not take your money to check your sneakers in here, it's all free for you.
	    		</p>
	    	</div>
    	</div>
    </div>

    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" alt="welcome" class="img">
    	</div>
    	<div class="mn-2">
    		<div class="meet">
	    		<h1 class="ctn-main-font ctn-min-color ctn-big">
	   				So, let's get started
	    		</h1>
	    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    			Do not waiting too long...
	    		</p>
	    		<div class="padding-top-5px">
	    			<a href="{{ url('/login') }}">
						<button class="btn btn-primary-color" style="margin-right: 10px;">
			    			Login
			    		</button>
			    	</a>
			    	<a href="{{ url('/register') }}">
			    		<button class="btn btn-main-color">
			    			Register
			    		</button>
			    	</a>
	    		</div>
	    	</div>
    	</div>
    </div>


    <!--
    <div class="toGo">
    	<button class="target btn btn-main-color btn-radius">
    		<span>How this is works?</span>
    		<span class="fa fa-lg fa-angle-down"></span>
    	</button>
    </div>
	-->
</div>
@endsection