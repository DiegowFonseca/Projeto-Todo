<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>

    <input id="{{$name}}"
    type="checkbox"
    name="{{$name}}"
    {{empty($required) ? '' : 'required'}}
    value="1"
    {{$checked ? 'checked': ''}}
    >
</div>
