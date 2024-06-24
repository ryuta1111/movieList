<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>movieList-edit</title>

        @vite('resources/css/app.css')
    </head>
    <body class="flex flex-col min-h-[100vh]">
        <header class="bg-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="py-6">
                    <p class="text-white text-xl">編集画面</p>
                </div>
            </div>
        </header>

        <main class="grow grid place-items-center">
            <div class="w-full mx-auto px-4 sm:px-6">
                <div class="py-[100px]">
                    <form action="/movieList/{{ $List->id }}" method="post" class="mt-10">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col items-center">
                            <label class="w-full max-w-3xl mx-auto">
                                <p>映画名</p>
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    type="text" name="movie_name" value="{{ $List->movie_name }}" />
                                @error('movie_name')
                                    <div class="mt-3">
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </label>
                            <label class="w-full max-w-3xl mx-auto">
                                <p>鑑賞方法</p>
                                <div class="form-group flex flex-direction-reverse justify-center mb-4">
                                    <div class="form-check form-check-inline mx-1">
                                        <input class="form-check-input" type="radio" id="chk01" name="how_to_watch" value="1" {{ old('how_to_watch', $menu->how_to_watch) == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label text-slate-950 text-base"
                                            for="chk01">映画館</label>
                                    </div>
                                    <div class="form-check form-check-inline mx-1">
                                        <input class="form-check-input" type="radio" id="chk02" name="how_to_watch" value="2" {{ old('how_to_watch', $menu->how_to_watch) == '2' ? 'checked' : '' }}>
                                        <label class="form-check-label text-slate-950 text-base"
                                            for="chk02">アプリ</label>
                                    </div>
                                    <div class="form-check form-check-inline mx-1">
                                        <input class="form-check-input" type="radio" id="chk03" name="how_to_watch" value="3" {{ old('how_to_watch', $menu->how_to_watch) == '3' ? 'checked' : '' }}>
                                        <label class="form-check-label text-slate-950 text-base"
                                            for="chk03">レンタル</label>
                                    </div>
                                </div>
                            </label>
                            <label class="w-full max-w-3xl mx-auto">
                                <p>一言メモ</p>
                                <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    type="text" name="comments" value="{{ $List->comments }}" />
                                @error('comments')
                                    <div class="mt-3">
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    </div>
                                @enderror
                            </label>
                            <label class="w-full max-w-3xl mx-auto">
                                <p>評価</p>
                                <div class="form-group flex flex-direction-reverse justify-center mb-4">
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="hidden form-check-input form-check-inline is-invalid" type="radio" id="evaluation1" name="evaluations" value="1">
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300"
                                            for="evaluation1">★</label>
                                    </div>
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="hidden form-check-input form-check-inline is-invalid" type="radio" id="evaluation2" name="evaluations" value="2">
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300"
                                            for="evaluation2">★</label>
                                    </div>
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="hidden form-check-input form-check-inline is-invalid" type="radio" id="evaluation3" name="evaluations" value="3">
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300"
                                            for="evaluation3">★</label>
                                    </div>
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="hidden form-check-input form-check-inline is-invalid" type="radio" id="evaluation4" name="evaluations" value="4">
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300"
                                            for="evaluation4">★</label>
                                    </div>
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="hidden form-check-input form-check-inline is-invalid" type="radio" id="evaluation5" name="evaluations" value="5">
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300"
                                            for="evaluation5">★</label>
                                        </div>
                                </div>
                            </label>

                            <div class="mt-8 w-full flex items-center justify-center gap-10">
                                <a href="/movieList" class="block shrink-0 underline underline-offset-2">
                                    戻る
                                </a>
                                <button type="submit"
                                    class="p-4 bg-sky-800 text-white w-full max-w-xs hover:bg-sky-900 transition-colors">
                                    編集する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer class="bg-slate-800">
            <div class="max-7xl mx-auto px-4 sm:px-6">
                <div class="px-4 text-center">
                    <p class="text-white text-sm">編集画面</p>
                </div>
            </div>
        </footer>
    </body>
</html>