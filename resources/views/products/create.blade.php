<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4 offset-4">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px;">Tambah Data Produk</h2>
                <form class="mt-3" action="{{ route('products.store', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <div class="mb-1">
                        <label for="gambar" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="text" class="form-control" id="gambar" name="gambar"
                            placeholder="Masukkan gambar produk">
                    </div>
                    <div class="mb-1">
                        <label for="nama" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan nama produk">
                    </div>
                    <div class="mb-1">
                        <label for="berat" class="form-label fw-semibold">Berat</label>
                        <input type="text" class="form-control" id="berat" name="berat"
                            placeholder="Masukkan berat produk">
                    </div>
                    <div class="mb-1">
                        <label for="harga" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga"
                            placeholder="Masukkan harga produk">
                    </div>
                    <div class="mb-1">
                        <label for="stok" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok"
                            placeholder="Masukkan stok produk">
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control" aria-label="Default select example" name="kondisi">
                            <option selected value="0">Pilih Kondisi Barang</option>
                            <option value="Bekas">Bekas</option>
                            <option value="Baru">Baru</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"
                            placeholder="Tuliskan deskripsi produk yang akan dijual"></textarea>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-dark mx-auto">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
