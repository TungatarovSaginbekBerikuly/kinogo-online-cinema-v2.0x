<ul class="category__menu">
    <li>
        <a href="{{ route('home') }}" class="category__link active">Все</a>
    </li>
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('showCategory', $category->alias) }}" class="category__link">
                {{ $category->title }}
            </a>
        </li>
    @endforeach
</ul>