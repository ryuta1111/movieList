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
                                <!-- <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    type="text" name="how_to_watch" value="{{ $List->how_to_watch }}" /> -->
                                <div class="flex flex-direction-reverse justify-center form-group mb-4">
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="form-check-input"
                                            id="" type="radio" name="how_to_watch">
                                            <label class="text-slate-950 text-base"
                                                for="1">映画館</label>
                                    </div>
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="form-check-input"
                                            id="2" type="radio" name="how_to_watch">
                                            <label class="text-slate-950 text-base"
                                                for="2">アプリ</label>
                                    </div>
                                    <div class="form-check form-check-inline is-invalid mx-1">
                                        <input class="form-check-input"
                                            id="3" type="radio" name="how_to_watch">
                                            <label class="text-slate-950 text-base"
                                                for="3">レンタル</label>
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
                                <!-- <input
                                    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                    type="text" name="evaluations" value="{{ $List->evaluations }}" />
                            </label> -->
                            <div class="flex flex-direction-reverse justify-center form-group mb-4">
                                <div class="form-check form-check-inline is-invalid mx-1">
                                    <input class="hidden form-check-input"
                                        id="review1" type="radio" name="evaluations" value="1" {{ old ('review1') == '1' ? 'checked' : ''}} checked>
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300 transition-colors"
                                            for="review1">★</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid mx-1">
                                    <input class="hidden form-check-input"
                                        id="review2" type="radio" name="evaluations" value="2" {{ old ('review2') == '2' ? 'checked' : ''}}>
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300 transition-colors"
                                            for="review2">★</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid mx-1">
                                    <input class="hidden form-check-input"
                                        id="review3" type="radio" name="evaluations" value="3" {{ old ('review3') == '3' ? 'checked' : ''}}>
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300 transition-colors"
                                            for="review3">★</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid mx-1">
                                    <input class="hidden form-check-input"
                                        id="review4" type="radio" name="evaluations" value="4" {{ old ('review4') == '4' ? 'checked' : ''}}>
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300 transition-colors"
                                            for="review4">★</label>
                                </div>
                                <div class="form-check form-check-inline is-invalid mx-1">
                                    <input class="hidden form-check-input"
                                        id="review5" type="radio" name="evaluations" value="5" {{ old ('review5') == '5' ? 'checked' : ''}}>
                                        <label class="form-check-label text-gray-500 text-2xl cursor-pointer hover:text-yellow-300 transition-colors"
                                            for="review5">★</label>
                                    </div>
                            </div>

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