@extends('layouts.app')
@section('title', 'Sneaker Checker')
@section('content')
<script type="text/javascript">
	function toLeft() {
		var wd = $('#ctnTag').width();
		var sc = $('#ctnTag').scrollLeft();
		if (sc >= 0) {
			$('#ctnTag').animate({scrollLeft: (sc - wd)}, 500);
		}
	}
	function toRight() {
		var wd = $('.banner .meet').height();
		var sc = $('.banner .bn-place').scrollTop();
		if (true) {
			$('.banner .bn-place').animate({scrollTop: (sc + wd)}, 500);
		}
		console.log(sc);
	}
	$(document).ready(function() {
		$('.banner .bn-place').scrollTop(0);
	});
</script>
<div >
    <div class="banner">
    	<div class="mn-1">
    		<img src="{{ asset('/img/yeti.gif') }}" class="img">
    	</div>
    	<div class="mn-2 bn-place">
    		<div class="meet">
    			<div class="meet-ctn">
	    			<h1 class="ctn-main-font ctn-min-color ctn-big">
	    				Hi there I'm Snoort.
	    			</h1>
	    			<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
	    				I can help you to check an original sneakers.
	    			</p>
	    			<div class="padding-top-5px">
		    			<button class="target btn btn-main-color btn-radius" onclick="toRight()">
				    		<span>How this is works?</span>
				    	</button>
				    </div>
				</div>
    		</div>

    		<div class="meet">
    			<div class="meet-ctn">
		    		<h1 class="ctn-main-font ctn-min-color ctn-big">
		   				How this is works?
		    		</h1>
		    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
		    			We check your sneakers with our professional verificators that have been sertificated.
		    		</p>
		    		<div class="padding-top-5px">
		    			<button class="target btn btn-main-color btn-radius" onclick="toRight()">
				    		<span>Is it easy to use?</span>
				    	</button>
				    </div>
	    		</div>
	    	</div>

	    	<div class="meet">
	    		<div class="meet-ctn">
		    		<h1 class="ctn-main-font ctn-min-color ctn-big">
		   				Is it easy to use?
		    		</h1>
		    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
		    			Ya, you just send me some pictures or links of your sneakers, and we would check your sneakers.
		    		</p>
		    		<div class="padding-top-5px">
		    			<button class="target btn btn-main-color btn-radius" onclick="toRight()">
				    		<span>Is it trusted?</span>
				    	</button>
				    </div>
	    		</div>
	    	</div>

	    	<div class="meet">
	    		<div class="meet-ctn">
		    		<h1 class="ctn-main-font ctn-min-color ctn-big">
		   				Is it trusted?
		    		</h1>
		    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
		    			Ofcourse, there are more then hundred verificators and online shops that work with us. So, you do not be affraid because it will be trusted.
		    		</p>
		    		<div class="padding-top-5px">
		    			<button class="target btn btn-main-color btn-radius" onclick="toRight()">
				    		<span>What would you get?</span>
				    	</button>
				    </div>
	    		</div>
	    	</div>

	    	<div class="meet">
	    		<div class="meet-ctn">
		    		<h1 class="ctn-main-font ctn-min-color ctn-big">
		   				What would you get?
		    		</h1>
		    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
		    			We will save your time and money. You can get original sneakers that has been checked by our proffesional verificators.
		    		</p>
		    		<div class="padding-top-5px">
		    			<button class="target btn btn-main-color btn-radius" onclick="toRight()">
				    		<span>Is it all free?</span>
				    	</button>
				    </div>
	    		</div>
	    	</div>

	    	<div class="meet">
	    		<div class="meet-ctn">
		    		<h1 class="ctn-main-font ctn-min-color ctn-big">
		   				And it's all free for you
		    		</h1>
		    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
		    			We do not take your money to check your sneakers in here, it's all free for you.
		    		</p>
		    		<div class="padding-top-5px">
		    			<button class="target btn btn-main-color btn-radius" onclick="toRight()">
				    		<span>What's next?</span>
				    	</button>
				    </div>
	    		</div>
	    	</div>

	    	<div class="meet">
	    		<div class="meet-ctn">
		    		<h1 class="ctn-main-font ctn-min-color ctn-big">
		   				Let's get started
		    		</h1>
		    		<p class="ctn-main-font ctn-min-color ctn-20px ctn-thin padding-bottom-10px">
		    			Do not waiting too long, check your sneakers today...
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
@endsection