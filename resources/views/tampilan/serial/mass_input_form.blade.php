<form action="{{ route('process-mass-input') }}" method="post">
    @csrf
    <label for="kode_buku">Kode Buku:</label>
    <select name="kode_buku" id="kode_buku" required>
        @foreach($bookApps as $bookApp)
            <option value="{{ $bookApp->kode_buku }}">{{ $bookApp->kode_buku }}</option>
        @endforeach
    </select>

    <label for="jumlah_serial">Jumlah Serial:</label>
    <input type="number" name="jumlah_serial" id="jumlah_serial" required>

    <button type="submit">Input Masal</button>
</form>

@if(session('success'))
    <div>{{ session('success') }}</div>
@elseif(session('error'))
    <div>{{ session('error') }}</div>
@endif
