<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
            display: inherit;
            flex-direction: column;
            padding: 20px;
        }

        .subtitle {
            margin-bottom: .75rem;
            font-size: 1.15rem;
            align-self: center;
            display: inline-block;
            padding-block: 0.25rem;
            letter-spacing: .25rem;
            padding-inline: .5rem;
            background: #636b6f;
            color: #fff;
            border: #000 .5px solid;
        }

        .title {
            font-size: 1.7rem;
        }

        .tag {
            margin-top: .25rem;
            margin-left: .25rem;
        }

        .tag:hover {
            text-decoration: none;
        }

        @media (min-width:1024px) {
            .subtitle {
                align-self: flex-start;
                font-size: 1.875rem;
            }

            .title {
                font-size: 2.875rem;
            }

            .tag {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="subtitle">
                {{ $code }}
            </div>
            <div class="title">
                {{ $msg }}
            </div>
            <a href="/" class="tag">Back</a>
        </div>
    </div>
</body>

</html>