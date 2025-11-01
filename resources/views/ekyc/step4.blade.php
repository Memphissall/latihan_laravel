<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Step 4 🏠 Data Alamat & Informasi Tambahan
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-8 bg-white p-6 rounded-lg shadow">
        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('ekyc.step4.store') }}">
            @csrf

            {{-- Alamat Domisili Lengkap --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Alamat Domisili Lengkap</label>
                <textarea name="alamat_lengkap" rows="3" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('alamat_lengkap', $data->alamat_lengkap ?? '') }}</textarea>
            </div>

            {{-- Provinsi --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Provinsi</label>
                <select name="provinsi" id="provinsi" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Provinsi --</option>
                    <option value="Jawa Barat" {{ old('provinsi', $data->provinsi ?? '') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                    <option value="Jawa Tengah" {{ old('provinsi', $data->provinsi ?? '') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                    <option value="Jawa Timur" {{ old('provinsi', $data->provinsi ?? '') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                </select>
            </div>

            {{-- Kota/Kabupaten --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kota / Kabupaten</label>
                <select name="kota" id="kota" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Kota/Kabupaten --</option>
                </select>
            </div>

            {{-- Kecamatan --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Kecamatan --</option>
                </select>
            </div>

            {{-- Kode Pos --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kode Pos</label>
                <input type="number" name="kode_pos" maxlength="6"
                    oninput="if(this.value.length>6)this.value=this.value.slice(0,6)"
                    value="{{ old('kode_pos', $data->kode_pos ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            {{-- Nama Ibu Kandung --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Ibu Kandung</label>
                <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $data->nama_ibu ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md">
            </div>

            {{-- Referensi / Sumber Informasi --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Referensi / Sumber Informasi Pendaftaran</label>
                <select name="referensi" class="mt-1 block w-full border-gray-300 rounded-md">
                    <option value="">-- Pilih Sumber Informasi --</option>
                    <option value="Sosial Media" {{ old('referensi', $data->referensi ?? '') == 'Sosial Media' ? 'selected' : '' }}>Sosial Media</option>
                    <option value="Kerabat" {{ old('referensi', $data->referensi ?? '') == 'Kerabat' ? 'selected' : '' }}>Kerabat</option>
                    <option value="Informasi Kampus" {{ old('referensi', $data->referensi ?? '') == 'Informasi Kampus' ? 'selected' : '' }}>Informasi Kampus</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Simpan & Selesai
                </button>
            </div>
        </form>
    </div>

    {{-- JS untuk select dinamis kota & kecamatan --}}
    <script>
        const kotaOptions = {
            "Jawa Barat": ["Bandung", "Bekasi", "Bogor"],
            "Jawa Tengah": ["Semarang", "Solo", "Magelang"],
            "Jawa Timur": ["Surabaya", "Malang", "Kediri"]
        };

        const kecamatanOptions = {
            "Bandung": ["Coblong", "Lengkong", "Cibiru"],
            "Bekasi": ["Bekasi Utara", "Bekasi Selatan"],
            "Bogor": ["Bogor Barat", "Bogor Timur"],
            "Semarang": ["Tembalang", "Candisari"],
            "Solo": ["Laweyan", "Banjarsari"],
            "Magelang": ["Magelang Selatan", "Magelang Tengah"],
            "Surabaya": ["Tegalsari", "Sukolilo", "Rungkut"],
            "Malang": ["Klojen", "Lowokwaru"],
            "Kediri": ["Mojoroto", "Pesantren"]
        };

        document.getElementById('provinsi').addEventListener('change', function() {
            const prov = this.value;
            const kotaSelect = document.getElementById('kota');
            kotaSelect.innerHTML = '<option value="">-- Pilih Kota/Kabupaten --</option>';

            if (kotaOptions[prov]) {
                kotaOptions[prov].forEach(k => {
                    const opt = document.createElement('option');
                    opt.value = k;
                    opt.textContent = k;
                    kotaSelect.appendChild(opt);
                });
            }

            document.getElementById('kecamatan').innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
        });

        document.getElementById('kota').addEventListener('change', function() {
            const kota = this.value;
            const kecSelect = document.getElementById('kecamatan');
            kecSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

            if (kecamatanOptions[kota]) {
                kecamatanOptions[kota].forEach(kec => {
                    const opt = document.createElement('option');
                    opt.value = kec;
                    opt.textContent = kec;
                    kecSelect.appendChild(opt);
                });
            }
        });
    </script>
</x-app-layout>
