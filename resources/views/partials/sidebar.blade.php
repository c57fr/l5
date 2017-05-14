<div class="sidebar-module sidebar-module-inset">
  <h4> À propos des articles </h4>
  <p> Articles <em> à titre d'exemples</em>.<br/>
    Juste compte la forme, pas le fond...</p>
</div>

<div class="sidebar-module">
  <h4>Archives</h4>
  <ol class="list-unstyled">

    @foreach($archives as $stats)
      <li>
        <a href="/articles/?month={{ $stats->month }}&year={{ $stats->year }}">
          {{ ucfirst(\App\C7::moisEnFr( $stats->month)) .' '.$stats->year }} (<strong>{{ $stats->published }}</strong>)
        </a>
      </li>
    @endforeach

  </ol>
</div>

<div class="sidebar-module">
  <h4>Autres</h4>
  <ol class="list-unstyled">
    <li><a href="https://github.com/c57fr/l5" target="_blank">GitHub</a></li>
    <li><a href="#">Facebook</a></li>
    <li><a href="#">Twitter</a></li>
  </ol>
</div>
