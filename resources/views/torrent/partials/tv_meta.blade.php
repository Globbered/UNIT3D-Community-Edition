<div class="movie-wrapper">
    <div class="movie-backdrop"
         style="background-image: url('https://images.weserv.nl/?url={{ $meta->backdrop ?? 'https://via.placeholder.com/1400x800' }}&w=1270&h=600');">
        <div class="tags">
            {{ $torrent->category->name }}
        </div>
    </div>
    <div class="movie-overlay"></div>
    <div class="container movie-container">
        <div class="row movie-row ">

            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-push-4 col-md-push-3 movie-heading-box">
                <h1 class="movie-heading">
                    <span class="text-bold">{{ $meta->name ?? 'No Meta Found' }}</span>
                    @if(isset($meta->first_air_date))
                    <span class="text-bold"><em> ({{ substr($meta->first_air_date, 0, 4) ?? '' }})</em></span>
                    @endif
                </h1>

                <br>

                <span class="movie-overview">
                    {{ Str::limit($meta->overview ?? '', $limit = 350, $end = '...') }}
                </span>

                <span class="movie-details">
                    @if (isset($meta->genres))
                        @foreach ($meta->genres as $genre)
                            <span class="badge-user text-bold text-green">
                                <i class="{{ config('other.font-awesome') }} fa-tag"></i> {{ $genre->name }}
                            </span>
                        @endforeach
                    @endif
                </span>

                <span class="movie-details">
                    <span class="badge-user text-bold text-orange">
                        Status: {{ $meta->status ?? 'Unknown' }}
                    </span>

                    <span class="badge-user text-bold text-orange">
                        @lang('torrent.runtime'): {{ $meta->episode_run_time ?? 0 }}
                        @lang('common.minute')@lang('common.plural-suffix')
                    </span>

                    <span class="badge-user text-bold text-gold">@lang('torrent.rating'):
                        <span class="movie-rating-stars">
                            <i class="{{ config('other.font-awesome') }} fa-star"></i>
                        </span>
                            {{ $meta->vote_average ?? 0 }}/10 ({{ $meta->vote_count ?? 0 }} @lang('torrent.votes'))
                    </span>
                </span>

                <span class="movie-details">
                    @if ($torrent->imdb != 0 && $torrent->imdb != null)
                        <span class="badge-user text-bold text-orange">
                            <a href="https://www.imdb.com/title/tt{{ $torrent->imdb }}" title="IMDB" target="_blank">
                                <i class="{{ config('other.font-awesome') }} fa-film"></i> IMDB: {{ $torrent->imdb }}
                            </a>
                        </span>
                    @endif

                    @if ($torrent->tmdb != 0 && $torrent->tmdb != null)
                        <span class="badge-user text-bold text-orange">
                            <a href="https://www.themoviedb.org/tv/{{ $torrent->tmdb }}" title="TheMovieDatabase"
                               target="_blank">
                                <i class="{{ config('other.font-awesome') }} fa-film"></i> TMDB: {{ $torrent->tmdb }}
                            </a>
                        </span>
                    @endif

                    @if ($torrent->mal != 0 && $torrent->mal != null)
                        <span class="badge-user text-bold text-pink">
                            <a href="https://myanimelist.net/anime/{{ $torrent->mal }}" title="MAL" target="_blank">
                                <i class="{{ config('other.font-awesome') }} fa-film"></i> MAL: {{ $torrent->mal }}</a>
                        </span>
                    @endif

                    @if ($torrent->tvdb != 0 && $torrent->tvdb != null)
                        <span class="badge-user text-bold text-pink">
                            <a href="https://www.thetvdb.com/?tab=series&id={{ $torrent->tvdb }}" title="TVDB"
                               target="_blank">
                                <i class="{{ config('other.font-awesome') }} fa-film"></i> TVDB: {{ $torrent->tvdb }}
                            </a>
                        </span>
                    @endif

                    @if (isset($meta->videoTrailer) && $meta->videoTrailer != '')
                        <span style="cursor: pointer;" class="badge-user text-bold show-trailer">
                            <a class="text-pink" title="@lang('torrent.trailer')">
                                <i class="{{ config('other.font-awesome') }} fa-external-link"></i> @lang('torrent.trailer')
                            </a>
                        </span>
                    @endif

                    <span class="badge-user text-bold">
                        <a href="{{ route('upload_form', ['category_id' => $torrent->category_id, 'title' => $meta->name ?? 'Unknown', 'imdb' => $torrent->imdb, 'tmdb' => $torrent->tmdb]) }}">
                            @lang('common.upload') {{ $meta->name ?? 'Unknown' }}
                        </a>
                    </span>

                    <div class="row cast-list">
                        @if (isset($meta->cast))
                            @foreach ($meta->cast as $actor)
                                <div class="col-xs-4 col-md-2 text-center">
                                    <a href="{{ route('mediahub.persons.show', ['id' => $actor->id]) }}">
                                        <img class="img-people" src="https://images.weserv.nl/?url={{ $actor->still ?? 'https://via.placeholder.com/95x140' }}&w=95&h=140"
                                             alt="{{ $actor->name }}">
                                        <span class="badge-user" style="white-space:normal;">
                                            <strong>{{ $actor->name }}</strong>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </span>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-8">
                <img src="https://images.weserv.nl/?url={{ $meta->poster ?? 'https://via.placeholder.com/600x900' }}&w=325&h=485"
                     class="movie-poster img-responsive hidden-xs">
            </div>

        </div>
    </div>
</div>
