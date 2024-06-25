<!DOCTYPE html>
<html lang= "ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieList</title>

    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-[100vh]">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">MovieList</p>
            </div>
        </div>
    </header>

    <main class="grow grid place-items-center">
        <div class="w-full mx-auto px-4 sm:px-6">
            <div class="py-[100px]">
                <p class="text-2xl font-bold text-center">鑑賞済みの映画</p>
                @if ($Lists->isNotEmpty())
                    <div class="max-w-7xl mx-auto mt-20">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr class="divide-x divide-gray-200">
                                            <th scape="col"
                                                class="py-3 pl-3 pr-3 text-center text-sm font-semibold text-gray-900">
                                                ID
                                            </th>
                                            <th scape="col"
                                                class="py-3 pl-3pr-3 text-center text-sm font-semibold text-gray-900">
                                                映画名
                                            </th>
                                            <th scape="col"
                                                class="py-3 pl-3pr-3 text-center text-sm font-semibold text-gray-900">
                                                鑑賞方法
                                            </th>
                                            <th scape="col"
                                                class="py-3 pl-3pr-3 text-center text-sm font-semibold text-gray-900">
                                                一言コメント
                                            </th>
                                            <th scape="col"
                                                class="py-3 pl-3pr-3 text-center text-sm font-semibold text-gray-900">
                                                評価
                                            </th>
                                            <th scape="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200  bg-white">
                                        @foreach($Lists as $item)
                                            <tr class="divide-x divide-gray-200">
                                                <td class="px-3 py-3 text-center text-sm text-gray-500">
                                                    <div>
                                                        {{ $item->id }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-left text-sm text-gray-500">
                                                    <div>
                                                        {{ $item->movie_name }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-center text-sm text-gray-500">
                                                    <div>
                                                        <input type="hidden" name="how_to_watch" value="{{ $item->how_to_watch }}" readonly />
                                                        <?php
                                                        if($item->how_to_watch == '1'){
                                                            echo '映画館';
                                                        }elseif($item->how_to_watch == '2'){
                                                            echo 'アプリ';
                                                        }elseif($item->how_to_watch == '3'){
                                                            echo 'レンタル';
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-left text-sm text-gray-500">
                                                    <div>
                                                        {{ $item->comments }}
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-center text-sm text-gray-500">
                                                    <div class="text-yellow-300">
                                                        <input type="hidden" name="evaluations" value="{{ $item->evaluations }}" readonly />
                                                            <?php
                                                            if($item->evaluations == '1'){
                                                                echo '★';
                                                            }elseif($item->evaluations == '2'){
                                                                echo '★★';
                                                            }elseif($item->evaluations == '3'){
                                                                echo '★★★';
                                                            }elseif($item->evaluations == '4'){
                                                                echo '★★★★';
                                                            }elseif($item->evaluations == '5'){
                                                                echo '★★★★★';
                                                            }
                                                            ?>
                                                    </div>
                                                </td>
                                                <td class="p-0 text-right text-sm font-medium">
                                                    <div class="flex justify-end">
                                                        <div>
                                                            <a href="/movieList/{{ $item->id }}/edit/"
                                                                class="inline-block text-center py-4 w-20 underline underline-offset-2 text-sky-600 md:hover:bg-sky-100 transition-colors">編集</a>
                                                        </div>
                                                        <div>
                                                            <form onsubmit="return deleteList();"
                                                                action="/movieList/{{ $item->id }}" method="post"
                                                                class="inline-block text-gray-500 font-medium"
                                                                role="menuitem" tabindex="-1">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="py-4 w-20 md:hover:bg-slate-200 transition-colors">削除</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <script>
                                            function deleteList(){
                                                if(confirm('本当に削除しますか？')){
                                                    return true;
                                                }else{
                                                    return false;
                                                }
                                            }
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="flex flex-col items-center mt-10">
                    <a href="http://127.0.0.1:8000/addition"
                                class="mt-8 p-4 bg-slate-800 text-white w-full max-w-xs hover:bg-slate-900 transition-colors text-center">
                                追加ページに戻る
                            </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-4 text-center">
                <p class="text-white text-sm">映画リスト</p>
            </div>
        </div>
    </footer>
</body>
</html>
