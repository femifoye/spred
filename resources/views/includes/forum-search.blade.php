<div class="forum-search">
    <form action="{{route('forums.search')}}" method="POST">
        @csrf
        <div class="form-search-inner">
            <input
            type="text"
            name="seek"
            class="form-control"
            id="forum_search_form"
            placeholder="&#xf002; Search All Topics"
            style="font-family: Arial, FontAwesome"
            required
            />
        </div>
    </form>
</div>
