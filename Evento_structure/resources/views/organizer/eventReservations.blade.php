<x-app-layout>
  <div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
      <div class="col-span-12 mt-5">
        <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
          <div class="bg-white p-4 shadow-lg rounded-lg">
            <div class="flex justify-between">
              <h1 class="font-bold text-base">Reservations Requests</h1>
            </div>
            <div class="mt-4">
              <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto">
                  <div class="py-2 align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                          <tr>
                            <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                              <div class="flex cursor-pointer">
                                <span class="mr-2">ID</span>
                              </div>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                              <div class="flex cursor-pointer">
                                <span class="mr-2">Reservation Number</span>
                              </div>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                              <div class="flex cursor-pointer">
                                <span class="mr-2">Reserved By</span>
                              </div>
                            </th>
                            <th colspan="3" class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                              <div class="flex cursor-pointer justify-center">
                                <span class="mr-2">Action</span>
                              </div>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach($reservations as $reservation)
                          <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                              <p>{{$reservation->id}}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                              <p>{{$reservation->PlaceNumber}}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                              <p>{{$reservation->clients->users->name}}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                              <div class="flex space-x-4">
                                <form action="{{ route('organizer.accept', $reservation) }}" method="post">
                                  @csrf
                                  @method('PATCH')
                                  <button type="submit" class="cursor-pointer text-green-500 hover:text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <p>Accept</p>
                                  </button>
                                </form>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                              <div class="flex space-x-4">
                                <!-- delete pop-up trigger -->
                                <form action="{{ route('reservation.refuse', $reservation) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <input type="hidden" name="event" value="{{ $event->id }}">
                                  <button type="submit" class=" cursor-pointer text-red-500 hover:text-red-600">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <p>Refuse</p>
                                  </button>
                                </form>
                              </div>
                            </td>
                            <!-- delete pop-up -->
                            <!-- <div id="popup-modal{{$reservation->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                          <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                              <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{$reservation->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                              </button>
                                              <form class="p-4 md:p-5 text-center" method="post" action="{{ route('reservation.destroy', $reservation) }}">
                                                @csrf
                                                @method('PATCH')
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to archive this Category?</h3>
                                                <button data-modal-hide="popup-modal{{$reservation->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                  Yes, I'm sure
                                                </button>
                                                <button data-modal-hide="popup-modal{{$reservation->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div> -->
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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
</x-app-layout>