<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('simpan-karyawan') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="id_karyawan" class="block text-gray-700 text-sm font-bold mb-2">ID Karyawan:</label>
                            <input type="text" name="id_karyawan" id="id_karyawan" class="form-input rounded-md shadow-sm mt-1 block w-full" readonly />
                        </div>
                        <div class="mb-4">
                            <button type="button" class="rounded-md px-3 py-2 bg-blue-500 text-white transition hover:bg-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-75" id="generate-id">
                                Generate ID
                            </button>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama Karyawan:</label>
                            <input type="text" name="nama" id="nama" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="tempat_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tempat Lahir:</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="agama" class="block text-gray-700 text-sm font-bold mb-2">Agama:</label>
                            <input type="text" name="agama" id="agama" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="mb-4">
                            <label for="no_telepon" class="block text-gray-700 text-sm font-bold mb-2">No Telepon:</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="rounded-md px-3 py-2 bg-blue-500 text-white transition hover:bg-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-75">
                                Simpan
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- pemisah form -->
            <div class="mt-8"></div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Daftar karyawan</h3>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="p-3 border border-gray-300">ID Karyawan</th>
                                <th class="p-3 border border-gray-300">Nama Karyawan</th>
                                <th class="p-3 border border-gray-300">Tempat Lahir</th>
                                <th class="p-3 border border-gray-300">Tanggal Lahir</th>
                                <th class="p-3 border border-gray-300">Agama</th>
                                <th class="p-3 border border-gray-300">No Telepon</th>
                                <th class="p-3 border border-gray-300">Aksi</th> <!-- Tambah kolom untuk aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawan->sortBy('nama') as $item)
                            <tr>
                                <td class="p-3 border border-gray-300">{{ $item->id_karyawan }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->nama }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->tempat_lahir }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->tanggal_lahir }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->agama }}</td>
                                <td class="p-3 border border-gray-300">{{ $item->no_telepon }}</td>
                                <td class="p-3 border border-gray-300">
                                    <form action="{{ route('hapus-karyawan', $item->id_karyawan) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
    <script>
        document.getElementById('generate-id').addEventListener('click', function() {
            document.getElementById('id_karyawan').value = Math.floor(Math.random() * 900000) + 100000;
        });
    </script>
</x-app-layout>
