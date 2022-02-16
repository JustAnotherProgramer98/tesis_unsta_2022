<select id="{{ $register ? 'city_name_host' : 'city_name'}}" class="{{ Auth::user() ? 'font-bold text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500  dark:focus:bg-gray-800 focus:outline-none ring-offset-2' : 'border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150'}}"
    name="city_id">
    @forelse ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
    @empty
    @endforelse
</select>
