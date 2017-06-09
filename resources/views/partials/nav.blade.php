<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item {{(App\C7::active('home'))?'active':''}}" href="/">Accueil</a>
      <a class="blog-nav-item {{(App\C7::active('articles'))?'active':''}}"
         href="/articles">Articles</a>
      <a class="blog-nav-item {{(App\C7::active('contact'))?'active':''}}" href="/contact">Contact</a>
      <a class="blog-nav-item {{(App\C7::active('about'))?'active':''}}" href="/about">À notre sujet</a>
      <a class="blog-nav-item {{(App\C7::active('test'))?'active':''}}" href="/test">Test</a>
      <a class="blog-nav-item {{(App\C7::active('vuejs'))?'active':''}}" href="vuejs">Vuejs</a>


      @if ( Auth::check() )

        <a class="blog-nav-item navbar-right" title="Cliqué ICI pour vous déloguer" href="{{ route('logout') }}"
           onclick=" event.preventDefault();
     document.getElementById('logout-form').submit();">
          {{Auth::user()->username}}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">xXx
          {{ csrf_field() }}
        </form>

      @else
        <div class="blog-nav-item navbar-right">
          <a href="/entrer">Connexion</a> |
          <a href="/enregistrer">S'enregistrer</a>
        </div>
      @endif

    </nav>
  </div>
</div>
