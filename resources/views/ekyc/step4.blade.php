<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Step 4 📍 Alamat Domisili & Referensi Pendaftaran
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow mt-8">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('ekyc.step4.store') }}">
            @csrf

            {{-- Alamat Domisili Lengkap --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Alamat Domisili Lengkap</label>
                <textarea name="alamat_lengkap" rows="3" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('alamatDomisili', $data->alamatDomisili ?? '') }}</textarea>
            </div>

            {{-- Provinsi --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                <select name="provinsi" id="provinsi" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach ($provinsiList as $prov)
                        <option value="{{ $prov }}" {{ old('provinsi', $data->provinsi ?? '') == $prov ? 'selected' : '' }}>
                            {{ $prov }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kota --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kota</label>
                <select name="kota" id="kota" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Kota --</option>
                    @foreach ($kotaList as $kota)
                        <option value="{{ $kota }}" {{ old('kota', $data->kota ?? '') == $kota ? 'selected' : '' }}>
                            {{ $kota }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kecamatan --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach ($kecamatanList as $kec)
                        <option value="{{ $kec }}" {{ old('kecamatan', $data->kecamatan ?? '') == $kec ? 'selected' : '' }}>
                            {{ $kec }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kode Pos --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kode Pos</label>
                <input type="text" name="kode_pos" id="kode_pos"
                    value="{{ old('kode_pos', $data->kode_pos ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md" readonly>
            </div>

            {{-- Nama Ibu Kandung --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Ibu Kandung</label>
                <input type="text" name="nama_ibu_kandung"
                    value="{{ old('nama_ibu_kandung', $data->nama_ibu_kandung ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            {{-- Referensi Sumber Informasi --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Sumber Informasi Pendaftaran</label>
                <select name="referensi_sumber" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Sumber --</option>
                    <option value="Sosial Media" {{ old('referensi_sumber', $data->referensi_sumber ?? '') == 'Sosial Media' ? 'selected' : '' }}>Sosial Media</option>
                    <option value="Teman" {{ old('referensi_sumber', $data->referensi_sumber ?? '') == 'Teman' ? 'selected' : '' }}>Teman</option>
                    <option value="Langsung dari Kampus" {{ old('referensi_sumber', $data->referensi_sumber ?? '') == 'Langsung dari Kampus' ? 'selected' : '' }}>Langsung dari Kampus</option>
                </select>
            </div>

            {{-- Navigasi --}}
            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('ekyc.step3') }}" class="text-sm text-gray-500 hover:text-gray-700">← Kembali ke Step 3</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    @if ($data && $data->status === 'submitted')
                     <a href="{{ route('ekyc.step5') }}" class="">Next</a>
                @else 
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan & Lanjut Step 5 -></button>
                @endif

                    
                </button>
            </div>
        </form>
    </div>

    {{-- Script Dinamis (Provinsi → Kota → Kecamatan → Kode Pos) --}}
    <script>
        const alamatData = @json($alamatList);

        // Provinsi → Kota
        document.getElementById('provinsi').addEventListener('change', function () {
            const prov = this.value;
            const kotaSelect = document.getElementById('kota');
            const kecSelect = document.getElementById('kecamatan');

            kotaSelect.innerHTML = '<option value="">-- Pilih Kota --</option>';
            kecSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

            const filteredKota = alamatData.filter(item => item.provinsi === prov).map(item => item.kota);
            const uniqueKota = [...new Set(filteredKota)];

            uniqueKota.forEach(kota => {
                kotaSelect.innerHTML += `<option value="${kota}">${kota}</option>`;
            });
        });

        // Kota → Kecamatan
        document.getElementById('kota').addEventListener('change', function () {
            const kota = this.value;
            const kecSelect = document.getElementById('kecamatan');

            kecSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

            const filteredKec = alamatData.filter(item => item.kota === kota).map(item => item.kecamatan);
            const uniqueKec = [...new Set(filteredKec)];

            uniqueKec.forEach(kec => {
                kecSelect.innerHTML += `<option value="${kec}">${kec}</option>`;
            });
        });

        // Kecamatan → Kode Pos
        document.getElementById('kecamatan').addEventListener('change', function () {
            const kec = this.value;
            const kodeInput = document.getElementById('kode_pos');
            const selected = alamatData.find(item => item.kecamatan === kec);
            kodeInput.value = selected ? selected.kode_pos : '';
        });
    </script>
</x-app-layout>
