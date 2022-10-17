<ul class="nav text-center bg-dark py-2 px-4">
  <li class="nav-item me-2">
      <img src="{{ asset('img/logo2.png') }}" class="mx-0" style="width: 40px">
  </li>
  <li class="nav-item">
    <a class="nav-link link-light" aria-current="page" href="{{ route('tests') }}"><span>TESTS<span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-light" href="{{ route('createRender') }}"><span>CREATE</span></a>
  </li>
  <li class="nav-item ms-auto">
    <a class="nav-link link-light" href="{{ route('logoutAction')}}"><span>exit</span></a>
  </li>
</ul>

<script>
$(document).ready(function(){
	$('.nav-item').hover(
	function(){
		$(this).find('span').css('color', '#339933');
	},
	function(){
		$(this).find('span').css('color', '#fff');
	});
})
</script>
