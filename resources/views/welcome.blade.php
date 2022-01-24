<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


{{--

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SMK NEGRI 3 Bogor">
    <meta name="keywords" content="Smk negri 3 Bogor, Smk negri Bogor, Smk Bogor">
    <meta name="author" content="Bonet">

    <!-- Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cabin&display=swap');

        html,
        body {
            position: relative;
            overflow-x: hidden;
        }

        .card-img-top {
            width: 200px;
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px);
        }


        body {
            font-family: 'Cabin', sans-serif;
            width: 100%;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            background-color: #f1f1ff;
            margin: 0;
            padding: 0;
        }

        .navbars {
            background-color: #c40464;
        }

        a {
            text-decoration: none;
        }



        .slick-prev,
        .slick-next {
            background: #000;
            border-radius: 15px;
            border-color: transparent;
        }

        .slick-slide {
            margin: 10px;
        }



        .logo i {
            padding: 10px;
            font-size: 15px;
        }

        .title {
            display: flex;
            font-size: 15px;
            padding: 15px;
            align-items: center;
        }

        .title h3 {
            font-size: 34px;
        }

        .srcs[type=search] {
            border-radius: 20px;
        }

        .swiperp {
            width: 85%;
            height: 70%;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            font-size: 18px;
            background: #f8f8ff;
            justify-content: center;
            align-items: center;
        }

        .swpr {
            background: #f8f8ff;
        }

        .swpr a {
            color: #000;
        }

        .swpr a:hover {
            color: #6d6d6d;
        }

        .text {
            width: 100%;
            padding: 8px 0;
            background: rgb(0, 0, 0, 0.5);
            position: absolute;
            bottom: 0px;
            text-align: justify;
            border-radius: 0 0 5px 5px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .crds a:hover {
            color: #000;
        }

        .info {
            width: 100%;
            padding: 8px 0;
            position: absolute;
            top: 280px;
            border-radius: 0 0 5px 5px;
        }

        .info h2 {
            font-size: 40px;
        }

        .info a {
            color: white;
            text-decoration: none;
        }

        .media img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .sa {
            margin-left: 380px;
            margin-bottom: 20px;
        }

        .carousel .carousel-item img {
            height: 160px;
            object-fit: cover;
        }

        .carousel .carousel-item img {
            height: 160px;
            object-fit: cover;
        }

        .dropdown-item:hover {
            background-color: #0d0e0f;
            color: white;
        }

        .dropdown-menu {
            background-color: #0f1a2b;
            color: white;
        }

        .text-ko {
            border-radius: 20px;
            justify-content: center;
            margin-top: 8px;

        }

        .ittm a {
            color: #000000;
        }

        .ittm a:hover {
            color: #2867db;
        }

        .qqw a {
            color: #000000;
        }

        .qqw a:hover {
            color: #2867db;
        }




        .crds a:hover {
            color: #000;
        }


        .carousel-control-next {
            top: -3%;
            height: 40px;
            width: 40px;
            right: 10%;
            border-radius: 25px;
        }

        .carousel-control-prev {
            left: 80%;
            top: -3%;
            height: 40px;
            width: 40px;
            border-radius: 25px;
        }


        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .kartu img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .karus img {
            width: 100%;
            height: 100%;
        }

        .center {
            width: 75%;
        }

        .crds {
            padding: 80px;
            top: 320px;
            position: absolute;
            background: rgb(0, 0, 0, 0.4);
            width: 600px;
            border-radius: 10px;
        }

        .xlf p a {
            color: #000;
        }

        .xlf p a:hover {
            color: #be3333;
            transition: 0.2s;
        }

        a:hover {
            color: #c5c5c5;
            transition: 0.2s;
        }

        .imb a {
            color: #000;
        }

        .imb a:hover {
            color: rgb(131, 131, 131);
        }

        .cri a {
            color: #000;
        }

        .cri a:hover {
            color: #d3cfcf;
            transition: 0.2s;
        }

        .crdf a:hover {
            color: #be3333;
            transition: 0.2s;
        }

        .crdf a {
            color: rgb(15, 15, 15);
        }

        .ckrt a:hover {
            color: #be3333;
            transition: 0.2s;
        }

        .ckrt a {
            color: rgb(15, 15, 15);
        }

        .frts {
            top: 300px;
            position: absolute;
            background: rgb(0, 0, 0, 0.5);
        }

        .frtss {
            top: 230px;
            position: absolute;
            background: rgb(0, 0, 0, 0.5);
        }

        a {
            position: relative;
            color: white;
        }




        @media (max-width: 1199px) {
            .rts {
                display: none;
            }

            .frameYt {
                margin-left: 100px;
            }

            .crds {
                top: 210px;
                width: 450px;
                padding: 10px;

            }



        }

        @media (max-width: 768px) {

            .karus img {
                object-fit: cover;
                width: 100%;
                height: 400px;
            }

            .center {
                width: 100%;
            }

            .crds {
                width: 270px;
                top: 230px;
                padding: 10px;
                background-color: rgb(0, 0, 0, 0.3);
            }


            .slick-prev,
            .slick-next {
                background: #000;
                border-radius: 15px;
                margin: 15px;
                border-color: transparent;
            }


            .rts {
                display: none;
            }

            .qq {
                display: none;
            }

            html,
            body {
                position: relative;

            }


            .sa {
                margin-left: 1px;
            }

            .logo {
                display: none;
            }

            .date {
                display: none;
            }

            .top {
                height: 80px;
            }

            .bbn {
                margin-top: 10px;
            }

            .frameYt {
                margin-left: 0px;
            }

        }

    </style>

    <link rel="shortcut icon" href="img/logo-removebg-preview.png" type="image/x-icon">

    <title>SMK NEGRI 3 BOGOR</title>

</head>

<body>


    <!-- header -->
    <header>

        <div class="top d-flex text-light" style="background-color: #042484; height: 70px;">
            <div class="top-title d-flex container mt-2">
                <p class="bbn btn text-light fw-bold fs-7"
                    style="background-color: #c40464; height: 40px; width: 100px;  border-radius: 50px; margin-right: 10px;">
                    Berita!</p>
                <div id="carouselExampleSlidesOnly" class="carousel slide mt-2" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, molestiae?</p>
                        </div>
                        <div class="carousel-item">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, sapiente..</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="date" style="margin-right: 15px; margin-top: 12px;">
                <p><span id="datE"></span></p>
            </div>
        </div>

        <div class="title container">
            <img src="img/logo-removebg-preview.png" alt="" class="" style="width: 70px; height: 70px;">
            <div class="mt-2">
                <h3 class="fw-bold">SMKN 3 BOGOR</h3>
            </div>

            <div class="logo ms-auto p-2">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-google"></i>
                <i class="bi bi-youtube"></i>
            </div>
        </div>

        <nav class="navbars navbar navbar-expand-lg navbar-dark" style="margin: auto;">
            <div class="container-fluid fw-bold">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-light" href="#">Sejarah</a></li>
                                <li><a class="dropdown-item text-light" href="#">Visi Misi</a></li>
                                <li><a class="dropdown-item text-light" href="#">Sarana Prasarana</a></li>
                                <li><a class="dropdown-item text-light" href="#">Prestasi</a></li>
                                <li><a class="dropdown-item text-light" href="#">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item text-light" href="#">OSIS</a></li>
                                <div class="btn-group dropend">
                                    <button type="button" class="btn dropdown-toggle text-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Warga Sekolah
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-light" href="#">Data Guru</a>
                                        <a class="dropdown-item text-light" href="#">Data Siswa</a>
                                        <a class="dropdown-item text-light" href="#">Data Staff</a>
                                        <a class="dropdown-item text-light" href="#">Data Alumni</a>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Struktur Organisasi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Informasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item  text-light" href="#">Berita</a></li>
                                <li><a class="dropdown-item  text-light" href="#">Agenda Sekolah</a></li>
                                <li><a class="dropdown-item  text-light" href="#">Pengumuman</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Galeri</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Buku Tamu</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                PSB
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item  text-light" href="#">Pendaftaran</a></li>
                                <li><a class="dropdown-item  text-light" href="#">Pengumuman</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">E-learning</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Al-quran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Daftar isi</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="srcs form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn text-light" style="
                background-color: #c40464;" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>


    </header>


    <!-- main -->
    <main>
        <!-- Slick -->
        <center>
            <div class="center">
                @foreach (DB::table('slider')->get() as $item)

                    <div>
                        <div class="karus card text-white border-0 align-items-center">
                            <img src="{{ url('slider/' . $item->gambar) }}" class="card-img" alt="...">
                            <div class="crds card-img-overlay text-start">
                                <a href="https://eviorthemes.com/ennlil/" class="fs-2  card-title fw-bold"
                                    target="_blank">{{ $item->judul }}</a>
                                <p class="card-text mt-2">{{ $item->created_at }}</p>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>
        </center>

        <!-- Featured -->
        <div class="container">

            <h2 class="fw-bold mt-5">Featured news</h2>

            <div class="row mb-2 ">
                <div class="sa col-12 mt-4">
                    <ul class="tabs nav rounded-pill mb-2 justify-content-center fs-5" id="" style=" width: 350px; background-color: #ffffff; ">
                        @foreach (DB::table('categories')->get() as $key => $item)
                        @if ($key == 0)
                        <li class="nav-item qqw text-center">
                            <a href="#tab{{$item->id}}" class="nav-link active fw-bold" data-bs-toggle="tab">{{$item->nama}}</a>
                        </li>
                        @else
                        <li class="nav-item qqw">
                            <a href="#tab{{$item->id}}" class="nav-link fw-bold" data-bs-toggle="tab">{{$item->nama}}</a>
                        </li>
                        @endif
                    @endforeach



                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 ">
                    <div class="tab-content">
                        @foreach (DB::table('categories')->get() as $ds => $ct)
                            @if ($ds == 0)


                                <div class="tab-pane fade show active" id="tab{{ $ct->id }}">
                                    <div class="row">
                                        @foreach (DB::table('berita')->where('categories', $ct->id)->get()
    as $key => $item)
                                            @if ($key == 0)
                                                <div class="col-md-6 mb-3">
                                                    <div class="tbf card bg-dark border-0 text-white ">
                                                        <img src="{{ url('thumbBerita/' . $item->gambar) }}"
                                                            class="w-100 class-img"
                                                            style=" height: 450px; object-fit: cover; border-radius: 10px;"
                                                            alt="">
                                                        <div class="frts card-img-overlay ">
                                                            <a href="https://eviorthemes.com/ennlil/"
                                                                class="fs-4  card-title fw-bold"
                                                                target="_blank">{{ $item->judul }}</a>
                                                            <p class="card-text mt-2">{{ $item->created_at }}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            @endif
                                        @endforeach


                                        <div class="col-md-6">
                                            <div class="row">



                                                @foreach (DB::table('berita')->where('categories', $ct->id)->get()
    as $item)
                                                    <div class="col-md-12 ">
                                                        <div class="col-sm-12 col-lg-12 mb-3">
                                                            <div class="card d-flex border-0 p-2"
                                                                style="height: 140px; width: 370px;">
                                                                <div class="media d-flex mt-2 ms-2">
                                                                    <div
                                                                        class="align-items-center mt-1 justify-content-center rounded me-3">
                                                                        <img src="{{ url('thumbBerita/' . $item->gambar) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="crdf media-body mt-3">
                                                                        <a href="https://eviorthemes.com/ennlil/"
                                                                            class="fs-6  card-title fw-bold"
                                                                            target="_blank">{{ $item->judul }}</a>
                                                                        <p class="mt-1"><small
                                                                                class=""> <i
                                                                                    class="bi bi-clock"></i>
                                                                                {{ $item->created_at }}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach






                                            </div>
                                        </div>

                                    </div>
                                </div>



                            @else

                                <div class="tab-pane fade show" id="tab{{ $ct->id }}">
                                    <div class="row">
                                        @foreach (DB::table('berita')->where('categories', $ct->id)->get()
    as $key => $item)
                                            @if ($key == 0)
                                                <div class="col-md-6 mb-3">
                                                    <div class="tbf card bg-dark border-0 text-white ">
                                                        <img src="{{ url('thumbBerita/' . $item->gambar) }}"
                                                            class="w-100 class-img"
                                                            style=" height: 450px; object-fit: cover; border-radius: 10px;"
                                                            alt="">
                                                        <div class="frts card-img-overlay ">
                                                            <a href="https://eviorthemes.com/ennlil/"
                                                                class="fs-4  card-title fw-bold"
                                                                target="_blank">{{ $item->judul }}</a>
                                                            <p class="card-text mt-2">{{ $item->created_at }}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            @endif
                                        @endforeach


                                        <div class="col-md-6">
                                            <div class="row">



                                                @foreach (DB::table('berita')->where('categories', $ct->id)->get()
    as $item)
                                                    <div class="col-md-12 ">
                                                        <div class="col-sm-12 col-lg-12 mb-3">
                                                            <div class="card d-flex border-0 p-2"
                                                                style="height: 140px; width: 370px;">
                                                                <div class="media d-flex mt-2 ms-2">
                                                                    <div
                                                                        class="align-items-center mt-1 justify-content-center rounded me-3">
                                                                        <img src="{{ url('thumbBerita/' . $item->gambar) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="crdf media-body mt-3">
                                                                        <a href="https://eviorthemes.com/ennlil/"
                                                                            class="fs-6  card-title fw-bold"
                                                                            target="_blank">{{ $item->judul }}</a>
                                                                        <p class="mt-1"><small
                                                                                class=""> <i
                                                                                    class="bi bi-clock"></i>
                                                                                {{ $item->created_at }}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach






                                            </div>
                                        </div>

                                    </div>
                                </div>


                            @endif
                        @endforeach





                    </div>
                </div>

                <div class="col-md-12 col-lg-4">
                    <div class="row p-3  mx-auto">
                        <div class=" col-sm-6 mb-2 text-center">
                            <button type="button" class=" btz btn btn-dark position-relative"
                                style="background-color: #55acee; width: 150px;"
                                href="https://www.youtube.com/watch?v=P-7AZYSlHw8&t=1465s">
                                <a href="https://eviorthemes.com/ennlil/"
                                    class="text-decoration-none fw-bold text-light">Twitter</a> <i
                                    class="bi bi-twitter"></i>
                            </button>
                        </div>
                        <div class=" col-sm-6 mb-2 text-center">
                            <button type="button" class=" btz btn btn-dark position-relative"
                                style="background-color: #3B5999; width: 150px;"
                                href="https://www.youtube.com/watch?v=P-7AZYSlHw8&t=1465s">
                                <a href="https://eviorthemes.com/ennlil/"
                                    class="text-decoration-none fw-bold text-light">Facebook</a> <i
                                    class="bi bi-facebook"></i>
                            </button>
                        </div>
                        <div class=" col-sm-6 mb-2 text-center">
                            <button type="button" class="btn btn-dark position-relative"
                                style="background-color: #C32AA4; width: 150px;"
                                href="https://www.youtube.com/watch?v=P-7AZYSlHw8&t=1465s">
                                <a href="https://eviorthemes.com/ennlil/"
                                    class="text-decoration-none fw-bold text-light">Instagram</a> <i
                                    class="bi bi-instagram"></i>
                            </button>
                        </div>
                        <div class=" col-sm-6 mb-2 text-center">
                            <button type="button" class="btn btn-dark position-relative"
                                style="background-color: #E42C27; width: 150px;"
                                href="https://www.youtube.com/watch?v=P-7AZYSlHw8&t=1465s">
                                <a href="https://eviorthemes.com/ennlil/"
                                    class="text-decoration-none fw-bold text-light">Youtube</a> <i
                                    class="bi bi-youtube"></i>
                            </button>
                        </div>

                        <div class="row bg-light justify-content-center align-items-center mt-4 m-1 p-3">
                            <h4 class="fw-bold mb-2">Most loved</h4>
                            <div class="col-12">
                                <div class="swiper mySwipers">
                                    <div class="swiper-wrapper">
                                       @foreach (DB::table('berita')->get() as $item)
                                       <div class="swiper-slide swpr mb-5">
                                        <img src="{{ url('thumbBerita/' . $item->gambar) }}" alt="" class="img-fluid mx-auto"
                                            style="object-fit: cover; width: 100%; height: 150px;">
                                        <a href="" class="text-start fw-bold fs-5">{{$item->judul}}</a>
                                    </div>

                                       @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- kateg -->
        {{-- <div class="qq container-fluid mt-4 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <div class="card bg-dark text-white ">
                            <img src="img/a1.png" class="card-img  w-100 h-50" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center fw-bold mt-4"
                                    style="background: rgb(0, 0, 0, 0.7); border-radius: 10px;">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card bg-dark text-white ">
                            <img src="img/a1.png" class="card-img  w-100 h-50" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center fw-bold mt-4"
                                    style="background: rgb(0, 0, 0, 0.7); border-radius: 10px;">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card bg-dark text-white ">
                            <img src="img/a1.png" class="card-img  w-100 h-50" alt="...">
                            <div class="card-img-overlay d">
                                <h5 class="card-title text-center fw-bold mt-4"
                                    style="background: rgb(0, 0, 0, 0.7); border-radius: 10px;">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card bg-dark text-white ">
                            <img src="img/a1.png" class="card-img  w-100 h-50" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center fw-bold mt-4"
                                    style="background: rgb(0, 0, 0, 0.7); border-radius: 10px;">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card bg-dark text-white ">
                            <img src="img/a1.png" class="card-img  w-100 h-50" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center fw-bold mt-4"
                                    style="background: rgb(0, 0, 0, 0.7); border-radius: 10px;">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card bg-dark text-white ">
                            <img src="img/a1.png" class="card-img  w-100 h-50" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title text-center fw-bold mt-4"
                                    style="background: rgb(0, 0, 0, 0.7); border-radius: 10px;">Card title</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- info -->
        <div class="container mt-5">
            <div class="row ">
                <div class="col-lg-8 col-md-12 dark">
                    <h2 class="fw-bold mb-4 mt-5">Editor's Picks</h2>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="img/a1.png" class="img-fluid rounded-start w-100 h-100"
                                    style=" object-fit: cover; width: 350px; height: 320px;" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card cri card-body mt-2 border-0">
                                    <a href="" class="fs-4 fw-bold card-title">Lorem ipsum dolor sit amet consectetur
                                        adipisicing. </a>
                                    <p class="card-text"><small class="text-muted"><i
                                                class="bi bi-clock"></i> Last updated 3 mins ago</small></p>
                                    <p class="card-text">This is a wider card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit longer.</p>
                                    <button href="" class="btn btn-danger">Read more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-8 ">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4 ">
                            <div class="card bg-dark border-0 text-white ">
                                <img src="img/a1.png" class="w-100 class-img"
                                    style=" height: 380px; object-fit: cover; border-radius: 10px;" alt="">
                                <div class="frtss card-img-overlay ">
                                    <a href="https://eviorthemes.com/ennlil/" class="fs-4  card-title fw-bold"
                                        target="_blank">Lorem ipsum dolor sit, amet consectetur adipisicing elit..</a>
                                    <p class="card-text mt-2">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 ">
                            <div class="card bg-dark border-0 text-white ">
                                <img src="img/a1.png" class="w-100 class-img"
                                    style=" height: 380px; object-fit: cover; border-radius: 10px;" alt="">
                                <div class="frtss card-img-overlay ">
                                    <a href="https://eviorthemes.com/ennlil/" class="fs-4  card-title fw-bold"
                                        target="_blank">Lorem ipsum dolor sit, amet consectetur adipisicing elit..</a>
                                    <p class="card-text mt-2">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 ">
                            <div class="card bg-dark border-0 text-white ">
                                <img src="img/a1.png" class="w-100 class-img"
                                    style=" height: 380px; object-fit: cover; border-radius: 10px;" alt="">
                                <div class="frtss card-img-overlay ">
                                    <a href="https://eviorthemes.com/ennlil/" class="fs-4  card-title fw-bold"
                                        target="_blank">Lorem ipsum dolor sit, amet consectetur adipisicing elit..</a>
                                    <p class="card-text mt-2">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4 ">
                            <div class="card bg-dark border-0 text-white ">
                                <img src="img/a1.png" class="w-100 class-img"
                                    style=" height: 380px; object-fit: cover; border-radius: 10px;" alt="">
                                <div class="frtss card-img-overlay ">
                                    <a href="https://eviorthemes.com/ennlil/" class="fs-4  card-title fw-bold"
                                        target="_blank">Lorem ipsum dolor sit, amet consectetur adipisicing elit..</a>
                                    <p class="card-text mt-2">Last updated 3 mins ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-12 bg-light" style="border-radius: 20px;">
                    <div class="row">
                        <div class="col-6 ms-4">
                            <ul class="tabs nav rounded-pill mb-2 mx-auto justify-content-center " id=""
                                style=" width: 300px; background-color: #ffffff; ">
                                <li class="nav-item ittm text-center">
                                    <a href="#popus" class="nav-link active fw-bold fs-6 "
                                        data-bs-toggle="tab">Home</a>
                                </li>
                                <li class="nav-item ittm">
                                    <a href="#recent" class="nav-link fw-bold fs-6 " data-bs-toggle="tab">Profile</a>
                                </li>
                                <li class="nav-item ittm">
                                    <a href="#comment" class="nav-link fw-bold fs-6 " data-bs-toggle="tab">Messages</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="tab-content ">
                            <div class="tab-pane fade show active" id="popus">
                                <div class="col-md-12 mb-3">
                                    <div class="card card-body d-flex border-0">
                                        <div class="media d-flex">
                                            <div class="align-items-center justify-content-center rounded me-3">
                                                <img src="img/a1.png" alt="">
                                            </div>
                                            <div class="imb media-body mt-2">
                                                <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit amet
                                                    consectetur, adipisicing elit.</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="card card-body d-flex border-0">
                                        <div class="media d-flex">
                                            <div class="align-items-center justify-content-center rounded me-3">
                                                <img src="img/a1.png" alt="">
                                            </div>
                                            <div class="imb media-body mt-2">
                                                <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit amet
                                                    consectetur, adipisicing elit.</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="card card-body d-flex border-0">
                                        <div class="media d-flex">
                                            <div class="align-items-center justify-content-center rounded me-3">
                                                <img src="img/a1.png" alt="">
                                            </div>
                                            <div class="imb media-body mt-2">
                                                <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit amet
                                                    consectetur, adipisicing elit.</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="card card-body d-flex border-0">
                                        <div class="media d-flex">
                                            <div class="align-items-center justify-content-center rounded me-3">
                                                <img src="img/a1.png" alt="">
                                            </div>
                                            <div class="imb media-body mt-2">
                                                <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit amet
                                                    consectetur, adipisicing elit.</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="card card-body d-flex border-0">
                                        <div class="media d-flex">
                                            <div class="align-items-center justify-content-center rounded me-3">
                                                <img src="img/a1.png" alt="">
                                            </div>
                                            <div class="imb media-body mt-2">
                                                <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit amet
                                                    consectetur, adipisicing elit.</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="recent">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comment">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="card card-body d-flex border-0">
                                                    <div class="media d-flex">
                                                        <div
                                                            class="align-items-center justify-content-center rounded me-3">
                                                            <img src="img/a1.png" alt="">
                                                        </div>
                                                        <div class="imb media-body mt-2">
                                                            <a href="" class="fs-6 fw-bold">Lorem ipsum dolor sit
                                                                amet consectetur, adipisicing elit.</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video -->
        <h2 class="fw-bold container mt-5 ">Featured Videos</h2>
        <div class="container mt-3 justify-content-center align-items-center" style="background-color: #182B49;">

            <div class="row ">
                <div class="col-lg-6 col-md-12">

                    <div class="ratio ratio-1x1" style="">
                        <iframe src="{{ DB::table('video')->orderBy('created_at', 'DESC')->first()->video }}"
                            title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-6 rts" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card card-body d-flex" style="background-color: #182B49;">
                                <div class="media d-flex ">
                                    <div class="align-items-center justify-content-center rounded me-3">
                                        <img src="img/a1.png" alt="">
                                    </div>
                                    <div class="media-body mt-3 text-light">
                                        <h5 class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Numquam, cumque!</h5>
                                        <small> <i class="bi bi-clock"></i> Lorem ipsum </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="card card-body d-flex" style="background-color: #182B49;">
                                <div class="media d-flex ">
                                    <div class="align-items-center justify-content-center rounded me-3">
                                        <img src="img/a1.png" alt="">
                                    </div>
                                    <div class="media-body mt-3 text-light">
                                        <h5 class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Numquam, cumque!</h5>
                                        <small> <i class="bi bi-clock"></i> Lorem ipsum </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-body d-flex" style="background-color: #182B49;">
                                <div class="media d-flex ">
                                    <div class="align-items-center justify-content-center rounded me-3">
                                        <img src="img/a1.png" alt="">
                                    </div>
                                    <div class="media-body mt-3 text-light">
                                        <h5 class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Numquam, cumque!</h5>
                                        <small> <i class="bi bi-clock"></i> Lorem ipsum </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <h2 class="fw-bold container mt-5">Don’t Miss</h2>
        <center>

            <div class="container mt-3">
                <div class="sel">
                    <div>
                        <div class="card kartu" style="width: 15rem;">
                            <img src="img/a1.png" class="card-img-top" alt="..." style="">
                            <div class="ckrt card-body text-start ">
                                <a href="" class="card-title fw-bold fs-5">Card title</a>
                                <p class="card-text mt-2">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <div class="">
                                    <hr>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card kartu" style="width: 15rem;">
                            <img src="img/a1.png" class="card-img-top" alt="..." style="">
                            <div class="ckrt card-body text-start">
                                <a href="" class="card-title fw-bold fs-5">Card title</a>
                                <p class="card-text mt-2">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <div class="">
                                    <hr>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card kartu" style="width: 15rem;">
                            <img src="img/a1.png" class="card-img-top" alt="..." style="">
                            <div class="ckrt card-body text-start">
                                <a href="" class="card-title fw-bold fs-5">Card title</a>
                                <p class="card-text mt-2">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <div class="">
                                    <hr>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card kartu" style="width: 15rem;">
                            <img src="img/a1.png" class="card-img-top" alt="..." style="">
                            <div class="ckrt card-body text-start">
                                <a href="" class="card-title fw-bold fs-5">Card title</a>
                                <p class="card-text mt-2">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <div class="">
                                    <hr>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card kartu" style="width: 15rem;">
                            <img src="img/a1.png" class="card-img-top" alt="..." style="">
                            <div class="ckrt card-body text-start">
                                <a href="" class="card-title fw-bold fs-5">Card title</a>
                                <p class="card-text mt-2">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <div class="">
                                    <hr>
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </main>


    <!-- footer -->
    <footer class="text-center text-lg-start bg-light mt-5">
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-youtube"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-github"></i>
                </a>
            </div>
        </section>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <img src="img/logo-removebg-preview.png" alt="" width="40px"> SMK NEGRI 3 BOGOR
                        </h6>
                        <p>
                            Menghasilkan tamatan yang mampu bekerja, mandiri, bertanggung jawab dan terus meningkatkan
                            keimanan, ketaqwaan, ilmu pengetahuan, keterampilan dengan prinsip belajar sepanjang hayat
                            serta mampu bersikap responsif dan adaptif terhadap perkembangan di era global
                        </p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mt-2 mx-auto mt-2 mb-4">
                        <div class="xlf">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="">HOME</a>
                            </p>
                            <p>
                                <a href="#!" class="">E-LEARNING</a>
                            </p>
                            <p>
                                <a href="#!" class="">PSB-ONLINE</a>
                            </p>
                            <p>
                                <a href="#!" class="">BUKU TAMU</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-2 mb-4">
                        <div class="xlf">
                            <h6 class="text-uppercase fw-bold mb-4">
                                More info
                            </h6>
                            <p>
                                <a href="#!" class="">Berita Terkini</a>
                            </p>
                            <p>
                                <a href="#!" class="">Pendaftaran</a>
                            </p>
                            <p>
                                <a href="#!" class="">Pengumuman</a>
                            </p>
                            <p>
                                <a href="#!" class="">Informasi</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-2 mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="bi bi-house"></i> Jl. Raya Pajajaran No. 84 Bogor - 15161 </p>
                        <p>
                            <i class="bi bi-envelope"></i>
                            smkn3bogor@gmail.com
                        </p>
                        <p><i class="bi bi-phone"></i> 0251-8327120</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="">website.com</a>
        </div>
    </footer>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Our Script -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
        const nav = document.querySelector(".navbar");
        let lastScrollY = window.scrollX;
        const dt = new Date();

        window.addEventListener("scroll", () => {
            if (lastScrollY < window.scrollY) {
                nav.classList.add("fixed-top");
            } else {
                nav.classList.remove("fixed-top");
            }

            // lastScrollY = window.scrollY;

        });


        document.getElementById("datE").innerHTML = dt.toDateString();




        // slidecard
        $(document).ready(function() {
            $('.sel').slick({
                accessibility: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,

                    }

                }, {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        infinite: true,

                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        infinite: true,
                        autoplay: true,
                    }
                }]
            });
        });


        // mostlove
        var swiper = new Swiper(".mySwipers", {
            pagination: {
                el: ".swiper-pagination",
            },
        });


        // imageAwal
        $('.center').slick({
            centerMode: true,
            arrows: false,
            slidesToShow: 1,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });


        var btnContain = document.getElementById("tabs")
        var btn = btnContain.getElementsByClassName("nav-link")

        for (var i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', function() {
                var current = document.getElementsByClassName("active")
                current[0].className = current[0].className.replace(" active")
                this.className += " active"
            })
        }
    </script>
</body>

</html> --}}
