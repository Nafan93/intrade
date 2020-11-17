@extends('admin.home')

@section('admincontent')



    <div class="uk-container uk-padding">
        <div aria-label="breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="{{ route('admin') }}">Панель управления</a></li>
                <li><span>Категории</span></li>
            </ul>
        </div>
        <!-- /.breadcrumb -->
        <h2>Категории</h2>
        <div class="uk-flex uk-flex-column">

            @if(session()->get('success'))
                <div class="uk-alert-success uk-width-1-2" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    {{ session()->get('success') }}  
                </div>
            @endif
            @if (isset($categories))
            @foreach ($categories as $category)
                <div class="uk-card">
                    <div class="uk-card-body">
                        <article class="uk-article">
                            <div class="uk-article-title uk-flex uk-flex-between uk-flex-middle">
                                <a class="uk-text-lead" href="{{ route('categories.show', $category->category_alias) }}">{{ $category->category_name }}</a>
                                <div class="uk-article-meta uk-flex uk-flex-around">
                                    <button class="uk-button uk-button-text uk-padding-right" type="button">
                                        <a href="{{ route('categories.edit', $category->id) }}" uk-icon="icon: file-edit" title="Редактировать"></a> 
                                    </button>
                                    <form action="{{ route('categories.destroy', $category->id)}}" method="post" style="margin:0">
                                        @csrf
                                        @method('DELETE')
                                        <button class="uk-button uk-button-danger uk-padding-remove uk-margin-left" type="submit" title="Удалить">
                                            <span uk-icon="icon: close"></span>
                                        </button>
                                    </form>
                                </div> 
                            </div>
                        </article>
                    </div>
                    <!-- /.uk-card-body -->
                    <hr>
                </div>
                <!-- /.uk-card -->
            @endforeach
                
            @endif
        </div>
        <!-- /.uk-flex -->
    </div>
    <!-- /.uk-container -->    

@endsection