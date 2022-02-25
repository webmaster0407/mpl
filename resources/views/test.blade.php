<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @include('partials.language_switcher')
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <form method="POST" action="{{ route('reset_password_without_token') }}">
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>