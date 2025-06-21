<!-- SIDEBAR -->
<section id="sidebar">
	<a href="#" class="brand">
		<img src="{{ asset('assets/img/logo-turtles.png') }}"
			style="height: 60px; margin-right: 10px;">
		<span class="text"><span class="turtle">Turtle’s</span><span class="resto"> Restaurant</span></span>
	</a>
	<ul class="side-menu top">
		<li class="{{ request()->routeIs('admin') ? 'active' : '' }}">
			<a href="{{ route('admin') }}">
			<i class='bx bxs-dashboard'></i>
			<span class="text">Dashboard</span>
			</a>
		</li>
		<li class="{{ request()->routeIs('akun') ? 'active' : '' }}">
			<a href="{{ route('akun') }}">
			<i class='bx bxs-user'></i>
			<span class="text">User Accounts</span>
			</a>
		</li>
		<li class="{{ request()->routeIs('menuAdmin') ? 'active' : '' }}">
			<a href="{{ route('menuAdmin') }}">
			<i class='bx bxs-food-menu'></i>
			<span class="text">Menu List</span>
			</a>
		</li>
		<li class="{{ request()->routeIs('orders') ? 'active' : '' }}">
			<a href="{{ route('orders') }}">
			<i class='bx bxs-cart'></i>
			<span class="text">Orders</span>
			</a>
		</li>
		<li class="{{ request()->routeIs('testimonialsAdmin') ? 'active' : '' }}">
			<a href="{{ route('testimonialsAdmin') }}">
			<i class='bx bxs-message-dots'></i>
			<span class="text">Testimonials</span>
			</a>
		</li>
		<li class="{{ request()->routeIs('messages') ? 'active' : '' }}">
			<a href="{{ route('messages') }}">
			<i class='bx bxs-envelope'></i>
			<span class="text">Messages</span>
			</a>
		</li>
		@auth
		<li>
			<a href="{{route('logout')}}"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
				class="logout">
				<i class='bx bxs-log-out-circle'></i>
				<span class="text">Logout</span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</li>
		@endauth
	</ul>
</section>
<!-- SIDEBAR -->