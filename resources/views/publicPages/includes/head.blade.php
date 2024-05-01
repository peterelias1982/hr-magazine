<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HR's Magazin</title>
    <link
        rel="shortcut icon"
        href="{{asset('publicPages/images/Red Black Minimalistic Square It Software Logo 1.png')}}"
        type="image/png"
    />
    <link rel="stylesheet" href="{{asset('publicPages/css/main.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('publicPages/css/style.css')}}"/>

    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    />

    <script>
        let messages = {};

        @if(session('messages'))
            messages = {!! session('messages') !!};
        @endif

            @if(session('resent'))
            messages.info = [
            ...(messages.info ?? []),
            "{{ __('A fresh verification link has been sent to your email address.') }}"
        ];
        @endif

            @if (session('status'))
            messages.info = [
            ...(messages.info ?? []),
            "{{ session('status') }}"
        ];
        @endif
    </script>
</head>
