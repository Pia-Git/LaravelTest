<div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">About</a>
          @if(Auth::check())
            <a class="nav-link" href="/laravel_git/laravel/public/posts/create">Create Post</a>
          	<a class="nav-link" href="/laravel_git/laravel/public/logout">Logout</a>
          @else
          	<a class="nav-link" href="/laravel_git/laravel/public/register">Register</a>
          @endif
          
          @if(Auth::check())
          	<a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
          @endif
          
        </nav>
      </div>
</div>