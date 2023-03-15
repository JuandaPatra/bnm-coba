<div class="search-box">
    <form action="{{ route('search') }}" method="GET">
        <div class="srch-btn">
            <div class="d-flex justify-content-center search-inside">
                <input type="text" placeholder="Type to search" name="search">
                <button class="btn btn-transparent btn-search" id="search-popup" type="submit">
                    <img src="{{asset('/images/bnm/components/navbar/search.png')}}" alt="">
                </button>
            </div>
        </div>
    </form>
</div>