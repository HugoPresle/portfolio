<div class="card my-3">
    <h3 class="text-2xl my-3">Shop</h3>
    <nav class="relative bg-white shadow rounded-md">
        <div class="container px-6 py-3 mx-auto md:flex">
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div
                class="mx-auto w-full px-6 py-4  bg-white md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
                <div class="flex" id="itemMenu">
                    <button id="obj" onclick="filterItems(this)" value="3"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Objets
                        <i class="fa-solid fa-box-archive fa-lg"></i>
                    </button>
                    <button id="equ" onclick="filterItems(this)" value="1"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Equipement
                        <i class="fa-solid fa-hammer fa-lg"></i>
                    </button>
                    <button id="evo" onclick="filterItems(this)" value="4"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Jetons d'évolution
                        <i class="fa-solid fa-coins fa-lg"></i>
                    </button>
                    <button id="cons" onclick="filterItems(this)" value="5"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Consommables
                        <i class="fa-solid fa-flask fa-lg"></i>
                    </button>
                    <button id="all" onclick="filterItems(this)" value="all"
                        class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-cyan-500 md:mx-2">
                        Tout
                    </button>
                </div>

                <div class="flex">
                    <button id="reset" onclick="resetFilters('mp_myMonster')"
                        class="hidden px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg hover:text-red-500 md:mx-2"><i
                            class="fa-solid fa-trash fa-gl"></i></button>

                    <div class="relative mt-4 md:mt-0">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                            </svg>
                        </span>

                        <input id="itemInput" type="text" onkeyup="searchItems(this)"
                            class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-400 rounded-lg focus:border-gray-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-gray-400"
                            placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex flex-wrap">
        <div id="divCardItem" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
            @foreach ($items as $item)
                <div id="item_{{ $item->item_id }}"
                    class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg cat_{{ $item->item_categories }}">
                    <div class="w-1/3 bg-cover">
                        <img src="{{ asset('img/img.png') }}" alt="item">
                    </div>

                    <div class="w-2/3 p-4 md:p-4">
                        <h3 id="itemName" class="text-xl font-bold text-gray-800">
                            {{ $item->name }}
                        </h3>

                        <p class="mt-2 text-sm text-gray-600">
                            {{ $item->description }}
                        </p>

                        <div class="flex justify-between mt-3 item-center">
                            <h2 class="text-lg font-bold text-gray-700md:text-xl">
                                <i class="fa-solid fa-coins fa-md"></i>
                                <span id="price_{{ $item->item_id }}" >{{ formatPrice($item->price) }}</span>
                                
                            </h2>
                            <div class="flex">
                                <select id="quantity_{{ $item->item_id }}"
                                    class="mx-1 px-1 py-0.5 text-xs uppercase transition-colors duration-300 transform rounded-md bg-gray-300 hover:bg-gray-400 focus:bg-gray-400 focus:outline-none border-gray-300"
                                    onchange="updatePrice({{ $item->item_id }}, {{ $item->price }})">
                                    <option value="1">x1</option>
                                    <option value="10">x10</option>
                                    <option value="100">x100</option>
                                </select>
                                <button
                                    onclick="buyAlert(
                                    {{ $item->item_id }}, 
                                    document.getElementById('quantity_{{ $item->item_id }}').value,'money')"
                                    class="mx-1 px-2 py-1 text-xs font-semibold uppercase transition-colors duration-300 transformbg-gray-300 rounded-md bg-gray-300 hover:bg-gray-400 focus:bg-gray-400 focus:outline-none">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
