{{-- meanmpilkan semua meta data yang ter input --}}

<!-- Tampilkan daftar data -->
@foreach($metaData as $data)
    <!-- Card atau elemen tampilan lainnya -->
    <a href="{{ route('metadata.view', $data->id) }}">
        <h2>{{ $data->judul }}</h2>
        <p>{{ $data->tahun_pembuatan }}</p>
        <!-- Tambahkan elemen tampilan lainnya seperti gambar, deskripsi, dll. -->
    </a>
@endforeach
