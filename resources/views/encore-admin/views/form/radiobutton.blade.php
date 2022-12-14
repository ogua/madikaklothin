<div {!! admin_attrs($group_attrs) !!}>

    

    <div class="offset-sm-2 col-sm-7">
        <label for="{{$id}}" class="col-form-label">{{$label}}</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @foreach($options as $option => $label)
                <label class="btn btn-@color {{ ($option == $value) || ($value === null && in_array($label, $checked)) ?'active':'' }}">
                    <input type="radio" name="{{$name}}" value="{{$option}}" class="{{$class}}" {{ ($option == $value) || ($value === null && in_array($label, $checked)) ?'checked':'' }} {!! $attributes !!} />&nbsp;{{$label}}&nbsp;&nbsp;
                </label>
            @endforeach
        </div>
        @include('admin::form.error')
        @include('admin::form.help-block')

    </div>
</div>
