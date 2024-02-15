<x-admin-app-layout>
  <x-slot name="header">
    <h2>Administrācijas panelis</h2>
  </x-slot>
  <x-slot name="content">

    {{--    <div class="container admin-container">--}}
    {{--      <div class="news-section-heading text-center">--}}
    {{--        <h2 class="admin__headings">Ziņas/jaunumi</h2>--}}
    {{--      </div>--}}
    {{--      <div class="news-section-add-new mb-2 text-center">--}}
    {{--        <a href="/admin/zinas/new" class="btn btn-success">Pievienot jaunu ziņu</a>--}}
    {{--      </div>--}}
    {{--      <div class="news-section-content">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--          @foreach($allNews as $newsItem)--}}
    {{--            @include('admin.news.delete-modal', ['id' => $newsItem->id])--}}
    {{--            <div class="col-3 m-2">--}}
    {{--              <div class="card">--}}
    {{--                <div class="card-body">--}}
    {{--                  <h5 class="card-title">{{ $newsItem->title }}</h5>--}}
    {{--                  <h6 class="card-subtitle mb-2 text-muted">Izveidots: {{ $newsItem->created_at }}</h6>--}}
    {{--                  <h6 class="card-subtitle mb-2 text-muted">Rediģēts: {{ $newsItem->updated_at }}</h6>--}}
    {{--                  <div class="d-flex align-items-center justify-content-between">--}}
    {{--                    <a href="/admin/zinas/{{$newsItem->id}}/edit" class="card-link">Rediģēt</a>--}}
    {{--                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete-news-modal">Dzēst--}}
    {{--                    </button>--}}
    {{--                  </div>--}}
    {{--                </div>--}}
    {{--              </div>--}}
    {{--            </div>--}}
    {{--          @endforeach--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </div>--}}
  </x-slot>
</x-admin-app-layout>
