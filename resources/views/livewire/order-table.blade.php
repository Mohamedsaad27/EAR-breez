<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input
                                wire:model.live.debounce.300ms = 'search'
                                type="text"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full ps-5 p-2 "
                                   placeholder="Search" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">

                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">OrderId</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Item</th>
                            <th scope="col" class="px-4 py-3">CustomerId</th>
                            <th scope="col" class="px-4 py-3">Customer Name</th>
                            <th scope="col" class="px-4 py-3">Order Date</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if ($orders->isEmpty())
                            <tr>
                                <td colspan="10" class="text-center py-4">No Orders Found.</td>
                            </tr>
                        @else
                        @foreach($orders as $order)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$order->id}}</th>
                            <td class="px-4 py-3">
                                @switch(strtolower($order->status))
                                    @case('new')
                                        <span class="text-green-500 font-semibold">New Order</span>
                                        @break
                                    @case('cancelled')
                                        <span class="text-red-500 font-semibold">{{ ucfirst($order->status) }}</span>
                                        @break
                                    @case('draft')
                                        <span class="text-gray-500 font-semibold">{{ ucfirst($order->status) }}</span>
                                        @break
                                    @case('shipped')
                                        <span class="text-green-300 font-semibold">{{ ucfirst($order->status) }}</span>
                                        @break
                                    @case('cancelled')
                                        <span class="text-red-500 font-semibold">{{ ucfirst($order->status) }}</span>
                                        @break
                                    @case('rejected')
                                        <span class="text-red-800 font-semibold">{{ ucfirst($order->status) }}</span>
                                        @break
                                    @default
                                        {{ ucfirst($order->status) }}
                                @endswitch
                            </td>

                            <td class="px-4 py-3 ">
                                {{$order->items}} Item</td>
                            <td class="px-4 py-3">{{$order->user->id}}</td>
                            <td class="px-4 py-3">{{$order->user->name}}</td>
                            <td class="px-4 py-3">{{$order->created_at->format('Y-m-d')}}</td>

                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live="perPage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $orders->links() }}
                </div>
            </div>
    </section>
        </div>

