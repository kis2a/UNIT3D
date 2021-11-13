<div>
	<div class="container-fluid">
		<style>
            .form-group {
                margin-bottom: 5px !important;
            }

            .badge-extra {
                margin-bottom: 0;
            }
		</style>
		<div x-data="{ open: false }" class="container box" id="torrent-list-search"
		     style="margin-bottom: 0; padding: 10px 100px; border-radius: 5px;">
			<div class="mt-5">
				<div class="row">
					<div class="form-group col-xs-9">
						<input wire:model="name" type="search" class="form-control" placeholder="Name"/>
					</div>
					<div class="form-group col-xs-3">
						<button class="btn btn-md btn-primary" @click="open = ! open"
						        x-text="open ? '@lang('common.search-hide')' : '@lang('common.search-advanced')'"></button>
					</div>
				</div>
				<div x-show="open" id="torrent-advanced-search">
					<div class="row">
						<div class="form-group col-sm-3 col-xs-6 adv-search-description">
							<label for="description" class="label label-default">@lang('torrent.description')</label>
							<input wire:model="description" type="text" class="form-control" placeholder="Description">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-mediainfo">
							<label for="mediainfo" class="label label-default">@lang('torrent.media-info')</label>
							<input wire:model="mediainfo" type="text" class="form-control" placeholder="Mediainfo">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-keywords">
							<label for="keywords" class="label label-default">@lang('torrent.keywords')</label>
							<input wire:model="description" type="text" class="form-control" placeholder="Keywords">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-uploader">
							<label for="uploader" class="label label-default">@lang('torrent.uploader')</label>
							<input wire:model="uploader" type="text" class="form-control" placeholder="Uploader">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3 col-xs-6 adv-search-tmdb">
							<label for="tmdbId" class="label label-default">TMDb</label>
							<input wire:model="tmdbId" type="text" class="form-control" placeholder="TMDb ID">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-imdb">
							<label for="imdbId" class="label label-default">IMDb</label>
							<input wire:model="imdbId" type="text" class="form-control" placeholder="IMDb ID">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-tvdb">
							<label for="tvdbId" class="label label-default">TVDb</label>
							<input wire:model="tvdbId" type="text" class="form-control" placeholder="TVDb ID">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-mal">
							<label for="malId" class="label label-default">MAL</label>
							<input wire:model="malId" type="text" class="form-control" placeholder="MAL ID">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-3 col-xs-6 adv-search-startYear">
							<label for="startYear" class="label label-default">@lang('torrent.start-year')</label>
							<input wire:model="startYear" type="text" class="form-control" placeholder="Start Year">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-endYear">
							<label for="endYear" class="label label-default">@lang('torrent.end-year')</label>
							<input wire:model="endYear" type="text" class="form-control" placeholder="End Year">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-playlist">
							<label for="playlist" class="label label-default">Playlist</label>
							<input wire:model="playlistId" type="text" class="form-control" placeholder="Playlist ID">
						</div>
						<div class="form-group col-sm-3 col-xs-6 adv-search-collection">
							<label for="collection" class="label label-default">Collection</label>
							<input wire:model="collectionId" type="text" class="form-control" placeholder="Collection ID">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-categories">
							<label for="categories" class="label label-default">@lang('common.category')</label>
							@foreach (App\Models\Category::select(['id', 'name', 'position'])->get()->sortBy('position') as $category)
								<span class="badge-user">
									<label class="inline">
										<input type="checkbox" wire:model="categories" value="{{ $category->id }}"> {{ $category->name }}
									</label>
								</span>
							@endforeach
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-types">
							<label for="types" class="label label-default">@lang('common.type')</label>
							@foreach (App\Models\Type::select(['id', 'name', 'position'])->get()->sortBy('position') as $type)
								<span class="badge-user">
									<label class="inline">
										<input type="checkbox" wire:model="types" value="{{ $type->id }}"> {{ $type->name }}
									</label>
								</span>
							@endforeach
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-resolutions">
							<label for="resolutions" class="label label-default">@lang('common.resolution')</label>
							@foreach (App\Models\Resolution::select(['id', 'name', 'position'])->get()->sortBy('position') as $resolution)
								<span class="badge-user">
									<label class="inline">
										<input type="checkbox" wire:model="resolutions" value="{{ $resolution->id }}"> {{ $resolution->name }}
									</label>
								</span>
							@endforeach
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-genres">
							<label for="genres" class="label label-default">@lang('common.genre')</label>
							@foreach (App\Models\Genre::all()->sortBy('name') as $genre)
								<span class="badge-user">
									<label class="inline">
										<input type="checkbox" wire:model="genres" value="{{ $genre->id }}"> {{ $genre->name }}
									</label>
								</span>
							@endforeach
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-buffs">
							<label for="buffs" class="label label-default">Buff</label>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="free" type="checkbox" value="1">
									Freeleech
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="doubleup" type="checkbox" value="1">
									Double Upload
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="featured" type="checkbox" value="1">
									Featured
								</label>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-tags">
							<label for="tags" class="label label-default">Tags</label>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="stream" type="checkbox" value="1">
									Stream Optimized
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="sd" type="checkbox" value="1">
									SD Content
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="highspeed" type="checkbox" value="1">
									Highspeed
								</label>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-extra">
							<label for="extra" class="label label-default">@lang('common.extra')</label>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="internal" type="checkbox" value="1">
									Internal
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="personalRelease" type="checkbox" value="1">
									Personal Release
								</label>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-health">
							<label for="health" class="label label-default">@lang('torrent.health')</label>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="alive" type="checkbox" value="1">
									@lang('torrent.alive')
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="dying" type="checkbox" value="1">
									@lang('torrent.dying-torrent')
								</label>
							</span>
							<span class="badge-user">
								<label class="inline">
									<input wire:model="dead" type="checkbox" value="1">
									@lang('torrent.dead-torrent')
								</label>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-sm-12 col-xs-6 adv-search-quantity">
							<label for="quantity" class="label label-default">@lang('common.quantity')</label>
							<span>
								<label class="inline">
								<select wire:model="perPage" class="form-control">
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								</label>
							</span>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<br>
	<div class="text-center">
		{{ $torrents->links() }}
	</div>
	<br>
	<div class="table-responsive block">
			<span class="badge-user torrent-listings-stats" style="float: right;">
				<strong>Total:</strong> {{ number_format($torrentsStat->total) }} |
				<strong>Alive:</strong> {{ number_format($torrentsStat->alive) }} |
				<strong>Dead:</strong> {{ number_format($torrentsStat->dead) }} |
			</span>
		<div class="dropdown torrent-listings-action-bar">
			<a class="dropdown btn btn-xs btn-success" data-toggle="dropdown" href="#" aria-expanded="true">
				@lang('common.publish') @lang('torrent.torrent')
				<i class="fas fa-caret-circle-right"></i>
			</a>
			<ul class="dropdown-menu">
				@php $categories = App\Models\Category::all() @endphp
				@foreach($categories as $category)
					<li role="presentation">
						<a role="menuitem" tabindex="-1" target="_blank" href="{{ route('upload_form', ['category_id' => $category->id]) }}">
							<span class="menu-text">{{ $category->name }}</span>
							<span class="selected"></span>
						</a>
					</li>
				@endforeach
			</ul>
			<a href="{{ route('categories.index') }}" class="btn btn-xs btn-primary">
				<i class="{{ config('other.font-awesome') }} fa-file"></i> @lang('torrent.categories')
			</a>
			<a href="#" class="btn btn-xs btn-primary">
				<i class="{{ config('other.font-awesome') }} fa-image"></i> @lang('torrent.cards')
			</a>
			<a href="#" class="btn btn-xs btn-primary">
				<i class="{{ config('other.font-awesome') }} fa-clone"></i> @lang('torrent.groupings')
			</a>
			<a href="{{ route('rss.index') }}" class="btn btn-xs btn-warning">
				<i class="{{ config('other.font-awesome') }} fa-rss"></i> @lang('rss.rss') @lang('rss.feeds')
			</a>
		</div>
		<div class="header gradient green" style="margin-top: 10px;">
			<div class="inner_content">
				<h5 style="font-weight: 900; font-size: 20px; margin: 8px;">
					@lang('torrent.torrents')
				</h5>
			</div>
		</div>
		<div id="torrents-movie-view">
			<div>
				<table class="torrent_table grouping table table--panel-like table--bordered basic-movie-list">
					<thead>
					<tr>
						<th class="small"></th>
						<th>
							<a href="#">Name</a> / <a href="#">Year</a> / <a href="#">IMDb Rating</a></th>
						<th>
							<a href="https://passthepopcorn.me/torrents.php?order_by=time&amp;order_way=desc">
								<img height="12" width="12" src="static/common/time.png" alt="Time" title="Time">
							</a>
						</th>
						<th>
							<a href="https://passthepopcorn.me/torrents.php?order_by=size&amp;order_way=desc">Size</a>
						</th>
						<th class="sign">
							<a href="https://passthepopcorn.me/torrents.php?order_by=snatched&amp;order_way=desc">
								<img src="static/styles/dark/images/snatched.png" alt="Snatches" title="Snatches">
							</a>
						</th>
						<th class="sign">
							<a href="https://passthepopcorn.me/torrents.php?order_by=seeders&amp;order_way=desc">
								<img src="static/styles/dark/images/seeders.png" alt="Seeders" title="Seeders">
							</a>
						</th>
						<th class="sign">
							<a href="https://passthepopcorn.me/torrents.php?order_by=leechers&amp;order_way=desc">
								<img src="static/styles/dark/images/leechers.png" alt="Leechers" title="Leechers">
							</a>
						</th>
					</tr>
					</thead>
					<tbody>
					<tr class="basic-movie-list__details-row">
						<td rowspan="6">
							<a href="torrents.php?id=77970" class="basic-movie-list__movie__cover-link">
								<img src="https://c1.ptpimg.me/view/808b63d16e9430a47bf9cd1c44a1be84b048e360/https://ptpimg.me/d52t0g.jpg"
								     class="basic-movie-list__movie__cover" style="width: 120px;">
							</a>
						</td>
						<td colspan="1">
							<span class="basic-movie-list__movie__title-row">
								<a href="torrents.php?id=77970" class="basic-movie-list__movie__title">Rage</a>
								<span class="basic-movie-list__movie__year">[1966]</span>
								<span class="basic-movie-list__movie__director-list"> by
									<a class="artist-info-link" href="artist.php?id=748118">Gilberto Gazcón</a>
								</span>
							</span>
							<div class="basic-movie-list__movie__ratings-and-tags">
								<div class="basic-movie-list__movie__rating-container">
									<span class="basic-movie-list__movie__rating__title">
										<a target="_blank" href="http://www.imdb.com/title/tt0060882/" rel="noreferrer">TMDb</a>:
									</span>
									<span class="basic-movie-list__movie__rating__rating">6.4</span>
								</div>
								<span class="basic-movie-list__movie__tags">
									<a href="torrents.php?taglist=drama&amp;cover=1" class="basic-movie-list__movie__tag">drama</a>,
									<a href="torrents.php?taglist=thriller&amp;cover=1" class="basic-movie-list__movie__tag">thriller</a>
								</span>
							</div>
						</td>
						<td class="nobr"><span class="time" title="Oct 15 2021, 19:12">27 mins ago</span></td>
						<td class="nobr">35.90 GiB (Max)</td>
						<td>30</td>
						<td class="">6</td>
						<td>2</td>
					</tr>
					<tr class="basic-movie-list__torrent-row ">
						<td colspan="7" class="basic-movie-list__torrent-edition" style="background-color: #222 !important;">
							<span class="basic-movie-list__torrent-edition__main">Feature Film</span> -
							<span class="basic-movie-list__torrent-edition__sub">Standard Definition</span>
						</td>
					</tr>
					<tr class="basic-movie-list__torrent-row">
						<td>
							<span class="basic-movie-list__torrent__action">
								<button class="btn btn-primary btn-circle" type="button" data-toggle="tooltip" data-original-title="@lang('common.download')">
									<i class="{{ config('other.font-awesome') }} fa-download"></i>
								</button>
							</span>
						</td>
						<td class="nobr">
							<span class="time" title="Oct 18 2012, 12:23">8 years ago</span>
						</td>
						<td class="nobr">978.71 MiB</td>
						<td>20</td>
						<td class="">2</td>
						<td>0</td>
					</tr>
					<tr class="basic-movie-list__torrent-row ">
						<td>
							<span class="basic-movie-list__torrent__action">
								<button class="btn btn-primary btn-circle" type="button" data-toggle="tooltip" data-original-title="@lang('common.download')">
									<i class="{{ config('other.font-awesome') }} fa-download"></i>
								</button>
							</span>
						</td>
						<td class="nobr">
							<span class="time" title="Nov 03 2019, 07:25">1 year ago</span>
						</td>
						<td class="nobr">1.28 GiB</td>
						<td>10</td>
						<td class="">3</td>
						<td>0</td>
					</tr>
					<tr class="basic-movie-list__torrent-row">
						<td colspan="7" class="basic-movie-list__torrent-edition" style="background-color: #222 !important;">
							<span class="basic-movie-list__torrent-edition__main">Feature Film</span> -
							<span class="basic-movie-list__torrent-edition__sub">High Definition</span>
						</td>
					</tr>
					<tr class="basic-movie-list__torrent-row">
						<td>
							<span class="basic-movie-list__torrent__action">
								<button class="btn btn-primary btn-circle" type="button" data-toggle="tooltip" data-original-title="@lang('common.download')">
									<i class="{{ config('other.font-awesome') }} fa-download"></i>
								</button>
							</span>
							<span>☐
								<a href="torrents.php?id=77970&amp;torrentid=978390" class="torrent-info-link" title="Rage.1982.AUS.1080p.Blu-ray.AVC.LPCM.2.0-PTer">
									BD50 / m2ts / Blu-ray / 1080p
								</a>
							</span>
						</td>
						<td class="nobr">
							<span class="time" title="Oct 15 2021, 19:12">27 mins ago</span>
						</td>
						<td class="nobr">35.90 GiB</td>
						<td>0</td>
						<td class="">1</td>
						<td>2</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		@if (! $torrents->count())
			<div class="margin-10 torrent-listings-no-result">
				@lang('common.no-result')
			</div>
		@endif
		<br>
		<div class="text-center torrent-listings-pagination">
			{{ $torrents->links() }}
		</div>
		<br>
		<div class="container-fluid well torrent-listings-legend">
			<div class="text-center">
				<strong>@lang('common.legend'):</strong>
				<button class='btn btn-success btn-circle torrent-listings-seeding' type='button' data-toggle='tooltip' title=''
				        data-original-title='@lang('torrent.currently-seeding')!'>
					<i class='{{ config('other.font-awesome') }} fa-arrow-up'></i>
				</button>
				<button class='btn btn-warning btn-circle torrent-listings-leeching' type='button' data-toggle='tooltip' title=''
				        data-original-title='@lang('torrent.currently-leeching')!'>
					<i class='{{ config('other.font-awesome') }} fa-arrow-down'></i>
				</button>
				<button class='btn btn-info btn-circle torrent-listings-incomplete' type='button' data-toggle='tooltip' title=''
				        data-original-title='@lang('torrent.not-completed')!'>
					<i class='{{ config('other.font-awesome') }} fa-spinner'></i>
				</button>
				<button class='btn btn-danger btn-circle torrent-listings-complete' type='button' data-toggle='tooltip' title=''
				        data-original-title='@lang('torrent.completed-not-seeding')!'>
					<i class='{{ config('other.font-awesome') }} fa-thumbs-down'></i>
				</button>
			</div>
		</div>
	</div>
</div>
</div>
