<div class="flex justify-center">

@if ($paginator->hasPages())
<nav aria-label="Page navigation">
  <ul class="flex items-center -space-x-px h-8 text-sm">

    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg">   
        <i class="fa-regular fa-chevron-left"></i>
    </li>
    @else
    <li wire:click="previousPage" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <i class="fa-regular fa-chevron-left"></i>
    </li>
    @endif
    <!-- prev end -->

    
    <!-- numbers -->
    @foreach ($elements as $element)
    <div class="flex">
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
    <li class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white" 
    wire:click="gotoPage({{$page}})">{{$page}}
    </li>
    @else
    <li class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
    wire:click="gotoPage({{$page}})">{{$page}}
    </li>
    @endif
    @endforeach
    @endif
    </div>
    @endforeach
    <!-- end numbers -->

    <!-- next  -->
    
    @if ($paginator->hasMorePages())
    <li wire:click="nextPage" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <i class="fa-regular fa-chevron-right"></i>
    </li>
    @else
    <li class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg ">
        <i class="fa-regular fa-chevron-right"></i>
    </li>
    @endif
    <!-- next end -->

  </ul>
  @endif
</nav>
</div>