<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ config('app.locales')[App::getLocale()] }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @foreach(config('app.locales') as $localeKey =>  $locale)
                <li><a href="{{ route("locale",[$localeKey]) }}">{{ $locale }}</a></li>
                @if($localeKey == 'en')
                <li class="divider"></li>
                @endif
                @endforeach
              </ul>
            </li>