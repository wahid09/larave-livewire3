    @component($layout['view'], $layout['params'])
        @slot($layout['slotOrSection'])
            {!! $content !!}
        @endslot
    @endcomponent