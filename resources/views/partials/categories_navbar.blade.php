<h4 style="opacity:0;">bla</h4>
<ul class="nav">
     @foreach($categories->all() as $category)
      <li class="list-group-item"> <a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
    @endforeach
</ul><br>