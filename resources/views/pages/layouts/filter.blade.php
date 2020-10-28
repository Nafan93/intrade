
    <form method="" action="{{ route('catalog') }}">
        <div class="uk-margin">
            <label class="label">Название товара</label>
            <div class="uk-inline">    
                <input type="text" class="uk-input" name="name" value="{{ request()->name }}" placeholder="Название товара"/>
            </div>
        </div>
        <ul uk-accordion="multiple: true">
            <li>
                <a class="uk-accordion-title" href="#">Категории</a>
                <div class="uk-accordion-content">
                    <div class="uk-flex uk-flex-column">
                       
                        @foreach ($categories as $category)
                        <div class="controls">
                            <input 
                                type="checkbox" 
                                name="categories[]" 
                                value="{{ $category->id ?? '' }}"
                                {{ (is_array(request()->categories) and in_array($category->id, request()->categories)) ? ' checked' : '' }}
                                class="uk-checkbox"
                                />
                            <label>{{ $category->category_name }}</label>
                        </div>
                        
                    @endforeach
                    </div>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title" href="#">Производители</a>
                <div class="uk-accordion-content">
                    <div class="uk-flex uk-flex-column">
                        @foreach ($manufacturers as $manufacturer)
                            <div class="uk-inline">
                                <input 
                                    type="checkbox" 
                                    name="manufacturers[]"
                                   value="{{ $manufacturer->id ?? '' }}"
                                   {{ (is_array(request()->manufacturers) and in_array($manufacturer->id, request()->manufacturers)) ? ' checked' : '' }}
                                   class="uk-checkbox" 
                                   />
                                <label for="">{{ $manufacturer->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>
            
        </ul>
        <div class="uk-margin">
            <label class="label">Цена</label>
            <div class="uk-inline">
                <div class="uk-flex uk-flex-between">
                    <input class="uk-input uk-width-2-5" type="text" name="min" value="{{ request()->min }}" placeholder="от">
                
                    <input class="uk-input uk-width-2-5" type="text" name="max" value="{{ request()->max }}" placeholder="до">
                </div>
            </div>
        </div>
                             
        <button type="submit" id="filter" class="uk-button uk-button-primary">Выбрать</button>
        <a href="{{ route('catalog') }}" class="uk-button uk-button-text">Сброс</a>
    </form>
