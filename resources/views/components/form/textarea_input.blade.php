<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>

    <textarea name="description" placeholder="{{$placeholder ?? ''}}"
    {{empty($required) ? '' : 'required'}}>{{$value ?? ''}}</textarea>
</div>
