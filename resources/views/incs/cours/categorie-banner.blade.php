<div class="bd-title text-center">
    <div class="bd-tag-share">
        <div class="tag d-flex justify-content-around flex-wrap">
            @foreach (\App\Matiere::all() as $matiere)
                <a class="primary-btn d-flex mt-3" href="{{route('coursfiltrer',$matiere->id)}}">{{$matiere->nom}}</a>
            @endforeach
        </div>
    </div>
</div>
