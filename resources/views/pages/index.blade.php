<x-laravel-easy-translations::app>
    <x-laravel-easy-translations::nav/>
    <div class="px-8 flex justify-center items-center">
        <div class="min-w-[400px] max-w-[500px]">
            <h2 class="my-2 text-2xl">
                Languages
            </h2>
            @if(!empty($languages = \JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper::getInstance()->getLanguages()))
                <ul class="mb-2">
                    @foreach($languages as $language)
                        <li class="py-2 relative border-b-black border-solid">
                            {{ucfirst($language)}}
                            <a href="{{route(\JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider::PACKAGE_NAME.'.edit',$language)}}"
                               class="absolute right-0 border-orange-500 border-solid rounded px-2 py-1 mt-[-5px] bg-orange-500 hover:bg-orange-300">
                                Edit
                                <img src="{{asset( 'vendor/laravel-easy-translations/images/pencil-solid.svg')}}"
                                     class="mr-3 sm:h-4 inline h-4"
                                     alt="Github Logo"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                No languages found, did you implement this package correctly?
            @endif
        </div>
    </div>
</x-laravel-easy-translations::app>
