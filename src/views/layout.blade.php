<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicxon SEO Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Support for manual dark mode toggle or system preference
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-slate-950 min-h-screen">
    <div class="py-12">
        @yield('content')
    </div>
</body>
</html>