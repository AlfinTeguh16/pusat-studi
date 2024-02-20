
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<h1>Data User</h1>

<div class="user-info">
    <div><strong>NIDN:</strong> {{ $user->nidn }}</div>
    <div><strong>Nama:</strong> {{ $user->nama }}</div>
    <div><strong>Email:</strong> {{ $user->email }}</div>
    @if($user->foto_profile)
        <div>
            <strong>Foto Profil:</strong>
            <img src="{{ asset('storage/' . Auth::user()->foto_profile) }}" alt="Foto Profil">

            {{-- <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil"> --}}
        </div>
    @endif
    <button onclick="openUpdateForm()">Update Profil</button>
</div>

<div id="updateFormModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUpdateForm()">&times;</span>

        <form action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <label for="nidn">NIDN:</label>
            <input type="text" name="nidn" value="{{ old('nidn', $user->nidn) }}" required>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

            <label for="foto_profile">Foto Profil:</label>
            <input type="file" name="foto_profile">

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Isi hanya jika ingin mengganti password">

            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation">

            <button type="submit">Perbarui Profil</button>
        </form>

    </div>
</div>

<script>
    function openUpdateForm() {
        document.getElementById('updateFormModal').style.display = 'block';
    }

    function closeUpdateForm() {
        document.getElementById('updateFormModal').style.display = 'none';
    }
</script>
