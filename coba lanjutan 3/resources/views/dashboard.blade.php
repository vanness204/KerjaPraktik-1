<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Ringkasan Kehadiran Karyawan (Bulan Ini)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-md">
                            <p class="font-semibold text-lg">Karyawan Hadir</p>
                            <p class="text-xl">{{ $jumlahHadir }}</p>
                        </div>
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-md">
                            <p class="font-semibold text-lg">Karyawan Izin</p>
                            <p class="text-xl">{{ $jumlahIzin }}</p>
                        </div>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md">
                            <p class="font-semibold text-lg">Karyawan Absen</p>
                            <p class="text-xl">{{ $jumlahAbsen }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- pemisah form -->
        <div class="mt-8"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Grafik Kehadiran Karyawan (Bulan Ini)</h3>
                <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Hadir', 'Izin', 'Absen'],
                    datasets: [{
                        label: 'Kehadiran Karyawan (Bulan Ini)',
                        data: [{{ $jumlahHadir }}, {{ $jumlahIzin }}, {{ $jumlahAbsen }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    
    
</x-app-layout>
