<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>
  <div class="max-w-sm rounded overflow-hidden shadow-lg mt-10">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{$event->title}}</div>

      <p class="text-gray-700 text-base">
        {{$event->description}}
      </p>
      <p class="text-gray-700 text-base">
        {{$event->date}}
      </p>
      <p class="text-gray-700 text-base">
        {{$event->venue}}
      </p>
      <p class="text-gray-700 text-base">
        {{$event->availablePlaces}}
      </p>
      <p class="text-gray-700 text-base">
        {{$event->validationType}}
      </p>
      @if($event->isValidByAdmin)
      <p class="text-gray-700 text-base">
        validated
      </p>
      @else
      <p class="text-gray-700 text-base">
        pending
      </p>
      @endif
    </div>
    @if($event->availablePlaces > 0)
    <form action="{{ route('reservation.store') }}" method="post">
      @csrf
      @method('POST')
      <input type="hidden" name="client" value="{{ Auth::user()->clients->id }}">
      <input type="hidden" name="event" value="{{ $event->id }}">
      <input type="hidden" name="placeNumber" value="{{ $event->availablePlaces }}">
      @if($event->validationType == 'automatic')
      <input type="hidden" name="validation" value="1">
      @else
      <input type="hidden" name="validation" value="0">
      @endif
      <button>Reserve</button>
    </form>
    @else
    <p> all places booked!</p>
    @endif
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$event->categories->name}}</span>
    </div>
  </div>
</x-app-layout>