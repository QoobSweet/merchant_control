<div>
    <div class="flex flex-col absolute inset-0 bg-gray-800 bg-opacity-50">
        <div class="flex flex-col flex-grow m-auto">
            <div class="flex flex-row flex-nowrap bg-gray-400 rounded-md m-auto">
                <div class="z-10 flex-grow mt-1 -mb-1 ml-1 -mr-1 p-1 max-w-10/12 bg-white rounded-md">
                    <!-- Header -->
                    <div class="flex flex-col p-2 border-b font-bold">
                        <div class="flex flex-row">
                            <h2 class="flex-grow">{{ $title ?? '' }}</h2>
                            <svg wire:click="{{ $closeMethodName ?? '' }}" class="cursor-pointer w-4 h-4 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                <g>
                                    <path d="M2.62,87.99L40.18,50L2.62,12.01C-0.8,8.88-0.87,5.68,2.4,2.41s6.47-3.2,9.6,0.21L50,40.19L87.99,2.62c3.13-3.42,6.33-3.49,9.6-0.21s3.2,6.47-0.21,9.6L59.82,50l37.57,37.98c3.42,3.13,3.49,6.33,0.21,9.6s-6.47,3.2-9.6-0.21L50,59.81L12.01,97.38c-3.13,3.42-6.33,3.49-9.6,0.21S-0.8,91.12,2.62,87.99z"></path>
                                </g>
                            </svg>
                        </div>
                    </div>

                    {{ $slot  }}
                </div>
            </div>
        </div>
    </div>
</div>
