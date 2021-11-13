<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Http\Livewire;

use App\Models\Tv;
use App\Models\Movie;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\History;
use App\Models\Keyword;
use App\Models\PersonalFreeleech;
use App\Models\PlaylistTorrent;
use App\Models\Torrent;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TorrentGroupedSearch extends Component
{
    use WithPagination;

    public $name = '';

    public $description = '';

    public $mediainfo = '';

    public $uploader = '';

    public $keywords = [];

    public $startYear = '';

    public $endYear = '';

    public $categories = [];

    public $types = [];

    public $resolutions = [];

    public $genres = [];

    public $tmdbId = '';

    public $imdbId = '';

    public $tvdbId = '';

    public $malId = '';

    public $playlistId = '';

    public $collectionId = '';

    public $free;

    public $doubleup;

    public $featured;

    public $stream;

    public $sd;

    public $highspeed;

    public $bookmarked;

    public $wished;

    public $internal;

    public $personalRelease;

    public $alive;

    public $dying;

    public $dead;

    public $notDownloaded;

    public $downloaded;

    public $seeding;

    public $leeching;

    public $incomplete;

    public $perPage = 25;

    public $sortField = 'bumped_at';

    public $sortDirection = 'desc';

    protected $queryString = [
        'name'             => ['except' => ''],
        'description'      => ['except' => ''],
        'mediainfo'        => ['except' => ''],
        'uploader'         => ['except' => ''],
        'keywords'         => ['except' => []],
        'startYear'        => ['except' => ''],
        'endYear'          => ['except' => ''],
        'categories'       => ['except' => []],
        'types'            => ['except' => []],
        'resolutions'      => ['except' => []],
        'genres'           => ['except' => []],
        'tmdbId'           => ['except' => ''],
        'imdbId'           => ['except' => ''],
        'tvdbId'           => ['except' => ''],
        'malId'            => ['except' => ''],
        'playlistId'       => ['except' => ''],
        'collectionId'     => ['except' => ''],
        'free'             => ['except' => false],
        'doubleup'         => ['except' => false],
        'featured'         => ['except' => false],
        'stream'           => ['except' => false],
        'sd'               => ['except' => false],
        'highspeed'        => ['except' => false],
        'bookmarked'       => ['except' => false],
        'wished'           => ['except' => false],
        'internal'         => ['except' => false],
        'personalRelease'  => ['except' => false],
        'alive'            => ['except' => false],
        'dying'            => ['except' => false],
        'dead'             => ['except' => false],
        'downloaded'       => ['except' => false],
        'seeding'          => ['except' => false],
        'leeching'         => ['except' => false],
        'incomplete'       => ['except' => false],
        'sortField'        => ['except' => 'bumped_at'],
        'sortDirection'    => ['except' => 'desc'],
        'page'             => ['except' => 1],
        'perPage'          => ['except' => ''],
    ];

    protected $rules = [
        'genres.*' => 'exists:genres,id',
    ];

    final public function paginationView(): string
    {
        return 'vendor.pagination.livewire-pagination';
    }

    final public function updatedPage(): void
    {
        $this->emit('paginationChanged');
    }

    final public function updatingName(): void
    {
        $this->resetPage();
    }

    final public function getTorrentsStatProperty()
    {
        return DB::table('torrents')
            ->selectRaw('count(*) as total')
            ->selectRaw('count(case when seeders > 0 then 1 end) as alive')
            ->selectRaw('count(case when seeders = 0 then 1 end) as dead')
            ->first();
    }

    final public function getPersonalFreeleechProperty()
    {
        return PersonalFreeleech::where('user_id', '=', \auth()->user()->id)->first();
    }

    final public function getTorrentsProperty(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        // TODO: Grouped Query
    }

    private static function parseKeywords($text): array
    {
        $parts = \explode(', ', $text);
        $result = [];
        foreach ($parts as $part) {
            $part = \trim($part);
            if ($part != '') {
                $result[] = $part;
            }
        }

        return $result;
    }

    final public function sortBy($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    final public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return \view('livewire.torrent-grouped-search', [
            'user'              => User::with('history')->findOrFail(\auth()->user()->id),
            'torrents'          => $this->torrents,
            'torrentsStat'      => $this->torrentsStat,
            'personalFreeleech' => $this->personalFreeleech,
        ]);
    }
}
