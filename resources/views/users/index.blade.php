@extends('dashboard')

@section('content')
<div class="">
    <h2 class="text-2xl font-bold mb-6">Users</h2>
    <form method="GET" action="{{ route('users.index') }}" class="mb-6 flex flex-col sm:flex-row items-stretch sm:items-center gap-2 sm:gap-4">
        <div class="flex flex-col">
            <label for="role" class="text-gray-700 font-medium mb-1">Filter by Role:</label>
            <select name="role" id="role" onchange="this.form.submit()" class="rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 py-2 px-3">
                <option value="">All</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                <!-- Add more roles as needed -->
            </select>
        </div>
        <div class="flex flex-col">
            <label for="email" class="text-gray-700 font-medium mb-1">Search Email:</label>
            <input type="text" name="email" id="email" value="{{ request('email') }}" placeholder="user@email.com"
                class="rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 py-2 px-3" />
        </div>
        <div class="flex flex-col justify-end sm:mb-0 mb-0  self-end">
            <button type="submit"
                class="bg-indigo-600 text-white px-4 rounded hover:bg-indigo-700 w-full sm:w-auto h-[42px]">
                Search
            </button>
        </div>
    </form>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <!-- <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th> -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
            @forelse($users as $user)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $user->id }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $user->name }}</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $user->email }}</td>
                    <!-- <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $user->role }}</td> -->
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-400">No users found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $users->withQueryString()->links('pagination::tailwind') }}
    </div>
</div>
@endsection