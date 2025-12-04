<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>RiauPort – Kelola Sopir Travel</title>

    <!-- FAVICON – sama seperti dashboard -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon_io/android-chrome-512x512.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
        }

        .shadow-soft {
            box-shadow: 0 12px 24px rgba(0, 0, 0, .16);
        }

        .shadow-pill {
            box-shadow: 0 8px 16px rgba(0, 0, 0, .18);
        }
    </style>
</head>

<body class="h-screen overflow-hidden bg-white text-slate-800">
    <div class="h-full flex">

        {{-- SIDEBAR – sama dengan dashboard --}}
        <aside
            class="w-[250px] h-full bg-gradient-to-b from-[#75d0f0] via-[#37a6cc] to-[#0a6687] flex flex-col items-center py-6">

            {{-- LOGO --}}
            <div class="mb-6">
                <img src="{{ asset('images/riauport-logo.png') }}" alt="RiauPort Logo"
                    class="h-16 object-contain mx-auto">
            </div>

            {{-- MENU --}}
            <nav class="space-y-3 w-full px-5 flex-1">
                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#0b5f80] text-white grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="m3 11 9-8 9 8"></path>
                            <path d="M9 22V12h6v10"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Dashboard</span>
                </a>

                {{-- Sopir --}}
                <a href="{{ route('admin.sopir.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Sopir</span>
                </a>

                {{-- Pelanggan --}}
                <a href="{{ route('admin.pelanggan.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 7h18l-1.5 9a2 2 0 0 1-2 1.7H6.5a2 2 0 0 1-2-1.7L3 7Z"></path>
                            <path d="M6 7V5a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v2"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">Pelanggan</span>
                </a>

                {{-- Personalisasi --}}
                <a href="{{ route('admin.personalisasi.index') }}"
                    class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                           rounded-lg px-4 py-2.5 shadow-pill text-sm">
                    <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"></path>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06A2 2 0 1 1 3.2 17l.06-.06a1.65 1.65 0 0 0 .33-1.82A1.65 1.65 0 0 0 2 14H1.91a2 2 0 1 1 0-4H2c.7 0 1.33-.41 1.6-1.05Z">
                            </path>
                        </svg>
                    </div>
                    <span class="font-semibold">Personalisasi</span>
                </a>
            </nav>

            {{-- TOMBOL KELUAR --}}
            <div class="w-full px-5 pt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-3 w-full bg-white text-[#0b5f80]
                               rounded-lg px-4 py-2.5 shadow-pill text-sm">
                        <div class="h-7 w-7 rounded-md bg-[#e7f5fb] text-[#0b5f80] grid place-items-center">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <path d="M16 17l5-5-5-5"></path>
                                <path d="M21 12H9"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 h-full flex flex-col bg-gray-50 overflow-y-auto">

            {{-- HEADER ATAS – sama gaya dengan dashboard --}}
            <div class="flex items-center justify-between px-10 pt-6 pb-4 bg-white border-b">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-[#0c607f]">
                        Kelola Sopir Travel
                    </h1>
                    <p class="text-gray-600 text-sm mt-1">
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-slate-500">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                    <div class="h-10 w-10 rounded-full bg-[#5fb7cf] grid place-items-center">
                        <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 22a8 8 0 0 1 16 0"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- KONTEN HALAMAN TRAVEL (PUNYA KAMU) --}}
            <div class="p-6">

                {{-- Stats Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Sopir</p>
                                <p class="text-3xl font-bold text-gray-900" id="totalSopir">3</p>
                            </div>
                            <i class="fas fa-user text-5xl text-blue-500 opacity-20"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Menunggu Validasi</p>
                                <p class="text-3xl font-bold text-gray-900" id="totalPending">1</p>
                            </div>
                            <i class="fas fa-shield-alt text-5xl text-yellow-500 opacity-20"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Disetujui</p>
                                <p class="text-3xl font-bold text-gray-900" id="totalApproved">1</p>
                            </div>
                            <i class="fas fa-check text-5xl text-green-500 opacity-20"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Ditolak</p>
                                <p class="text-3xl font-bold text-gray-900" id="totalRejected">1</p>
                            </div>
                            <i class="fas fa-times text-5xl text-red-500 opacity-20"></i>
                        </div>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="bg-white rounded-lg shadow">
                    {{-- Search --}}
                    <div class="p-6 border-b">
                        <div class="relative">
                            <i
                                class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="searchInput"
                                placeholder="Cari nama sopir, travel, atau email..."
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>

                    {{-- Tabs --}}
                    <div class="border-b">
                        <div class="flex overflow-x-auto">
                            <button
                                class="tab-btn px-6 py-3 font-medium text-sm whitespace-nowrap border-b-2 border-blue-500 text-blue-600"
                                data-tab="semua">
                                Semua Sopir (<span id="countSemua">3</span>)
                            </button>
                            <button
                                class="tab-btn px-6 py-3 font-medium text-sm whitespace-nowrap border-b-2 border-transparent text-gray-600 hover:text-gray-900"
                                data-tab="pending">
                                Menunggu Validasi (<span id="countPending">1</span>)
                            </button>
                            <button
                                class="tab-btn px-6 py-3 font-medium text-sm whitespace-nowrap border-b-2 border-transparent text-gray-600 hover:text-gray-900"
                                data-tab="approved">
                                Disetujui (<span id="countApproved">1</span>)
                            </button>
                            <button
                                class="tab-btn px-6 py-3 font-medium text-sm whitespace-nowrap border-b-2 border-transparent text-gray-600 hover:text-gray-900"
                                data-tab="rejected">
                                Ditolak (<span id="countRejected">1</span>)
                            </button>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Sopir</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Travel</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Kendaraan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Rute</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Tanggal Daftar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody" class="divide-y divide-gray-200">
                                {{-- Diisi oleh JavaScript --}}
                            </tbody>
                        </table>
                    </div>

                    {{-- Empty State --}}
                    <div id="emptyState" class="text-center py-12 hidden">
                        <i class="fas fa-user text-gray-300 text-6xl mb-4"></i>
                        <p class="text-gray-500">Tidak ada sopir ditemukan</p>
                    </div>
                </div>
            </div>

            {{-- MODAL DETAIL --}}
            <div id="detailModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                <div class="bg-white rounded-lg max-w-3xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="sticky top-0 bg-white border-b px-6 py-4 flex items-center justify-between">
                        <h2 class="text-2xl font-bold text-gray-900">Detail Pengajuan Travel</h2>
                        <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <div class="p-6" id="modalContent">
                        {{-- Diisi oleh JavaScript --}}
                    </div>
                </div>
            </div>

        </main>
    </div>

    {{-- SCRIPT ASLI KAMU (TIDAK DIUBAH) --}}
    <script>
        // data dari controller
        let drivers = @json($drivers);
        let currentTab = 'semua';
        let searchTerm = '';

        function getStatusBadge(status) {
            const styles = {
                pending: 'bg-yellow-100 text-yellow-800',
                approved: 'bg-green-100 text-green-800',
                rejected: 'bg-red-100 text-red-800'
            };
            const labels = {
                pending: 'Menunggu Validasi',
                approved: 'Disetujui',
                rejected: 'Ditolak'
            };
            return `<span class="px-3 py-1 rounded-full text-xs font-medium ${styles[status] || 'bg-slate-100 text-slate-700'}">
                    ${labels[status] || status || 'Tidak diketahui'}
                </span>`;
        }

        function updateStats() {
            const stats = {
                total: drivers.length,
                pending: drivers.filter(d => d.status === 'pending').length,
                approved: drivers.filter(d => d.status === 'approved').length,
                rejected: drivers.filter(d => d.status === 'rejected').length
            };

            document.getElementById('totalSopir').textContent = stats.total;
            document.getElementById('totalPending').textContent = stats.pending;
            document.getElementById('totalApproved').textContent = stats.approved;
            document.getElementById('totalRejected').textContent = stats.rejected;

            document.getElementById('countSemua').textContent = stats.total;
            document.getElementById('countPending').textContent = stats.pending;
            document.getElementById('countApproved').textContent = stats.approved;
            document.getElementById('countRejected').textContent = stats.rejected;
        }

        function renderTable() {
            const filtered = drivers.filter(driver => {
                const nama = (driver.nama || '').toLowerCase();
                const travelName = (driver.travelName || '').toLowerCase();
                const email = (driver.email || '').toLowerCase();

                const matchSearch =
                    nama.includes(searchTerm.toLowerCase()) ||
                    travelName.includes(searchTerm.toLowerCase()) ||
                    email.includes(searchTerm.toLowerCase());

                if (currentTab === 'semua') return matchSearch;
                return matchSearch && driver.status === currentTab;
            });

            const tbody = document.getElementById('tableBody');
            const emptyState = document.getElementById('emptyState');

            if (filtered.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
                tbody.innerHTML = filtered.map(driver => `
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <img src="${driver.foto}" alt="${driver.nama}" class="w-10 h-10 rounded-full">
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">${driver.nama}</p>
                                <p class="text-sm text-gray-500">${driver.email || '-'}</p>
                                <p class="text-xs text-gray-400">${driver.telp || ''}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-medium text-gray-900">${driver.travelName || '-'}</p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-car text-gray-400 mr-2"></i>
                            <div>
                                <p class="font-medium text-gray-900">${driver.jenisKendaraan || '-'}</p>
                                <p class="text-gray-500">${driver.platNomor || '-'}</p>
                                <p class="text-xs text-gray-400">Tahun ${driver.tahunKendaraan || '-'}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                            ${driver.rute || '-'}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-calendar text-gray-400 mr-1"></i>
                            ${driver.tglDaftar || '-'}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        ${getStatusBadge(driver.status)}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <button onclick="showDetail(${driver.id})"
                                class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="deleteDriver(${driver.id})"
                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                title="Hapus (dummy)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
            }

            updateStats();
        }

        function showDetail(id) {
            const driver = drivers.find(d => d.id === id);
            if (!driver) return;

            const modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = `
            <!-- Driver Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900">Informasi Sopir</h3>
                <div class="flex items-center mb-4">
                    <img src="${driver.foto}" alt="${driver.nama}" class="w-20 h-20 rounded-full">
                    <div class="ml-4">
                        <p class="text-xl font-bold text-gray-900">${driver.nama}</p>
                        <p class="text-gray-600">${driver.email || '-'}</p>
                        <p class="text-gray-600">${driver.telp || ''}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                    <div>
                        <p class="text-sm text-gray-500">Nama Travel</p>
                        <p class="font-medium text-gray-900">${driver.travelName || '-'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Rute</p>
                        <p class="font-medium text-gray-900">${driver.rute || '-'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Daftar</p>
                        <p class="font-medium text-gray-900">${driver.tglDaftar || '-'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Status</p>
                        <div class="mt-1">${getStatusBadge(driver.status)}</div>
                    </div>
                </div>
            </div>

            <!-- Vehicle Info -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900">Informasi Kendaraan</h3>
                <div class="grid grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                    <div>
                        <p class="text-sm text-gray-500">Jenis Kendaraan</p>
                        <p class="font-medium text-gray-900">${driver.jenisKendaraan || '-'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Plat Nomor</p>
                        <p class="font-medium text-gray-900">${driver.platNomor || '-'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tahun Kendaraan</p>
                        <p class="font-medium text-gray-900">${driver.tahunKendaraan || '-'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">WhatsApp</p>
                        <p class="font-medium text-gray-900">${driver.whatsapp || '-'}</p>
                    </div>
                </div>
            </div>
        `;

            document.getElementById('detailModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // fungsi approve/reject/delete masih dummy (hanya ubah data di JS)
        function approveDriver(id) {
            drivers = drivers.map(d =>
                d.id === id ? {
                    ...d,
                    status: 'approved'
                } : d
            );
            closeModal();
            renderTable();
            alert('Pengajuan travel telah disetujui (dummy di frontend)!');
        }

        function rejectDriver(id) {
            const alasan = prompt('Masukkan alasan penolakan:');
            if (alasan) {
                drivers = drivers.map(d =>
                    d.id === id ? {
                        ...d,
                        status: 'rejected',
                        alasanReject: alasan
                    } : d
                );
                closeModal();
                renderTable();
                alert('Pengajuan travel telah ditolak (dummy di frontend)!');
            }
        }

        function deleteDriver(id) {
            if (confirm('Apakah Anda yakin ingin menghapus sopir ini?')) {
                drivers = drivers.filter(d => d.id !== id);
                renderTable();
                alert('Sopir berhasil dihapus (dummy di frontend)!');
            }
        }

        // Event Listeners
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('border-blue-500', 'text-blue-600');
                    b.classList.add('border-transparent', 'text-gray-600');
                });
                this.classList.remove('border-transparent', 'text-gray-600');
                this.classList.add('border-blue-500', 'text-blue-600');
                currentTab = this.dataset.tab;
                renderTable();
            });
        });

        document.getElementById('searchInput').addEventListener('input', function(e) {
            searchTerm = e.target.value;
            renderTable();
        });

        // Initial render
        renderTable();
    </script>
</body>

</html>
