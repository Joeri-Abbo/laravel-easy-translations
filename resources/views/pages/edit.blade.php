<x-laravel-easy-translations::app>
    <x-laravel-easy-translations::nav/>
    <div class="px-8 flex justify-center items-center mb-4">
        <div class="min-w-[400px] max-w-[500px]">
            @if(session()->has('message'))
                <div class="bg-green-400 rounded py-2 my-1">
                    {{ session()->get('message') }}
                </div>
            @endif
            <h2 class="my-2 text-2xl">
                Translations : {{ucfirst($language)}}
            </h2>
            <form
                    action="{{route(\JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider::PACKAGE_NAME.'.update',$language)}}"
                    method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @foreach(\JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper::getInstance()->getLanguageTranslations($language) as $key => $value)
                    <div class="mb-6">
                        <label for="{{$key}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{$key}}
                        </label>
                        <input type="text" id="{{$key}}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               required
                               name="{{$key}}"
                               value="{{$value}}">
                    </div>
                @endforeach
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-laravel-easy-translations::app>
