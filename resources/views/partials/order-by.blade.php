<div class="selectbox-wrap">
    <div class="selectbox">
        <p class="selectbox-desc">Сортировка по:</p>
        <div class="selectbox-btn" data-selectbox="1">
            Рекомендуемые
            <span></span>
        </div>
        <ul data-selectbox="1" class="selectbox-body">
            <li>
                <a href="{{ route('home') }}" class="selectbox-link">Рекомендуемые</a>
            </li>
            <li>
                <a href="#" class="selectbox-link">Популярные</a>
            </li>
            <li>
                <a href="#" class="selectbox-link">По дате</a>
            </li>
            <li>
                <a href="#" class="selectbox-link">Топ - 100</a>
            </li>
        </ul>
    </div>

    <div class="selectbox">
        <p class="selectbox-desc">По году выпуска:</p>
        <div class="selectbox-btn" data-selectbox="2">
            2025
            <span></span>
        </div>
        <ul data-selectbox="2" class="selectbox-body">
            @foreach ($release_dates as $release_date)
                <li>
                    <a href="#" class="selectbox-link">
                        {{ $release_date->year }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
