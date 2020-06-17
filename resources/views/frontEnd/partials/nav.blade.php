<div class="menu">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<div class="heading">
					@foreach(App\Models\HeaderBottom::title() as $title)
					<a class="navbar-brand title" href="{{ Route('index')}}">{{ $title->title}}<br><span class="title-slug">{{$title->slug}}</span></a>
					@endforeach
				  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  	</button>
				</div>
				
				<div class="main-menu ml-50">
					 <div class="collapse navbar-collapse" id="navbarSupportedContent">
					  	<ul class="navbar-nav navbar-right">
					  		<li class="nav-item">
							      <a class="nav-link" href="{{Route('index')}}">হোম</a>	
							 </li>
					  		@foreach(App\Models\Category::all() as $category)						
							  <li class="nav-item">
							      <a class="nav-link" href="{{ ($category->name=='হোম')? Route('index'):Route('category',['id'=>$category->id,'name'=>$category->name] )}}">{{ $category->name}}</a>	
							  </li>
							  @endforeach
							
						</ul>
						<!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
					
				  </div>
				</div>
				 
			</div>		 
</nav>
</div>
