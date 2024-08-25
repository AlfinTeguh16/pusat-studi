@extends('admins.master')

@section('content')
<div class="p-3 sm:ml-64">
    

    <div class="border border-gray-300 rounded-lg p-4 mt-8">
        <div class="container mx-auto py-6">
            <h1 class="text-3xl font-bold mb-8 text-center">User Activity</h1>

            <!-- Activity Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr class="text-left font-bold">
                            <th class="px-6 py-3 text-sm uppercase tracking-wider">Username</th>
                            <th class="px-6 py-3 text-sm uppercase tracking-wider">Aktivitas</th>
                            <th class="px-6 py-3 text-sm uppercase tracking-wider">Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userActivities as $data)
                        <tr>
                            <td class="border px-6 py-4">{{ $data->username }}</td>
                            <td class="border px-6 py-4">{{ $data->activity }}</td>
                            <td class="border px-6 py-4">{{ $data->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $userActivities->links() }}
            </div>
        </div>
    </div>


@endsection
