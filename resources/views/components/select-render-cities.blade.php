<select id="city_name" class="font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2 "
    name="city_id">
    @forelse ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
    @empty
    @endforelse
</select>
