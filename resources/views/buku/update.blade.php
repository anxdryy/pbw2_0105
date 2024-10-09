<x-layout>
    <div class="container">
        <div class="row p-lg-3">
            <div class="col">
                <form action="/buku/{{$buku->id}}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <h1>Ubah Buku</h1>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid  @enderror"
                            value="{{ $buku->judul }}" id="judul" name="judul">
                        @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                            value="{{ $buku->penulis }}" id="penulis" name="penulis">
                        @error('penulis')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select form-select-md mb-3 @error('kategori') is-invalid @enderror"
                            name="kategori" id="kategori">
                            <option value="" selected>Pilih Kategori</option>
                            <option value="Novel" {{ $buku->kategori == 'Novel' ? 'Selected' : ''}}>Novel</option>
                            <option value="Novel" {{ $buku->kategori == 'Komik' ? 'Selected' : ''}}>Komik</option>
                            <option value="Novel" {{ $buku->kategori == 'Biografi' ? 'Selected' : ''}}>Biografi</option>
                        </select>
                        @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sampul" class="form-label">Sampul buku</label>
                        @if ($buku->sampul)
                            <img src="{{ asset('storage/' . $buku->sampul) }}" class="img-priview img-fluid mb-3 d-block"
                                width="250px">
                        @else
                            <img id="img-preview" class="img-fluid mb-3 w-250px">
                        @endif
                        <input type="hidden" name="sampulLama" value="{{ $buku->sampul }}">
                        <input class="form-control @error('sampul') is-invalid @enderror" type="file"
                            value="{{ $buku->sampul }}" id="sampul" name="sampul" onchange="previewImage()">
                        @error('sampul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#sampul');
            const imagePreview = document.querySelector('#img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
</x-layout>
