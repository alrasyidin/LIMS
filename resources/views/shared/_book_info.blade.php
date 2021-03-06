<ul class="list-group text-left info-list">
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-id-card-o fa-fw"></i>
    &nbsp;&nbsp;ISBN: {{ $book->isbn }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-book fa-fw"></i>
    &nbsp;&nbsp;Title: {{ $book->title }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-archive fa-fw"></i>
    &nbsp;&nbsp;Category: {{ App\Models\Category::where('id', $book->category)->first()['name'] }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-pencil fa-fw"></i>
    &nbsp;&nbsp;Author: {{ $book->author }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-building fa-fw"></i>
    &nbsp;&nbsp;Publisher: {{ $book->publisher }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-dollar fa-fw"></i>
    &nbsp;&nbsp;Price: {{ $book->price }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-hourglass-1 fa-fw"></i>
    &nbsp;&nbsp;Total: {{ $book->total }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-hourglass-2 fa-fw"></i>
    &nbsp;&nbsp;Available: {{ $book->available }}
  </li>
  <li class="list-group-item list-group-item-action">
    <i class="fa fa-location-arrow fa-fw"></i>
    &nbsp;&nbsp;Location: {{ $book->location }}
  </li>
  <li class="list-group-item">
    <button class="list-group-item pay-btn" data-toggle="modal" data-target="#intro">
      <i class="fa fa-pencil-square-o fa-fw"></i>
      &nbsp;&nbsp;Intro
    </button>
    <div class="modal fade" id="intro" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
          </div>
          <div class="modal-body" style="word-wrap:break-word;">
            {{ $book->intro }}
          </div>
        </div>
      </div>
    </div>
  </li>
  @if (in_array(App\Models\User::getRole(Auth::user()), ['Superuser', 'Books admin', 'Readers admin']))
    <li class="list-group-item">
      <a href="{{ route('records.index', array('isbn' => $book->isbn, 'type' => '1')) }}">
        <button class="list-group-item pay-btn">
          <i class="fa fa-history fa-fw"></i>
          &nbsp;&nbsp;Borrowed records
        </button>
      </a>
    </li>
    <li class="list-group-item">
      <a href="{{ route('records.index', array('isbn' => $book->isbn, 'type' => '2')) }}">
        <button class="list-group-item pay-btn">
          <i class="fa fa-history fa-fw"></i>
          &nbsp;&nbsp;Returned records
        </button>
      </a>
    </li>
  @endif
</ul>
