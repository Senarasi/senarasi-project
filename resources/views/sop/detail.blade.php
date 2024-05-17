@extends('layout.index')

@section('title')
    Detail SOP - Budgeting System
@endsection

@section('content')
    <!--Badan Isi-->
    <a href="/sop" style="text-decoration: none">
        <button class="navback">
            <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
              <path
                d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
          7.2501 0 7.6501 0 8.0501Z "
                fill="#4A25AA "
              />
            </svg>
            Back
          </button>
    </a>



    {{-- <div style="display: inline-flex; gap: 12px;">
        <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal1"> Add
            Vendor <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                    fill="white" />
            </svg>
        </button>
        <button type="button" class="button-departemen" data-bs-toggle="modal" data-bs-target="#modal2"> Add
            Barang <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.99995 2.7002C9.23865 2.7002 9.46756 2.79502 9.63635 2.9638C9.80513 3.13258 9.89995 3.3615 9.89995 3.6002V8.10019H14.4C14.6386 8.10019 14.8676 8.19502 15.0363 8.3638C15.2051 8.53258 15.3 8.7615 15.3 9.0002C15.3 9.23889 15.2051 9.46781 15.0363 9.63659C14.8676 9.80537 14.6386 9.9002 14.4 9.9002H9.89995V14.4002C9.89995 14.6389 9.80513 14.8678 9.63635 15.0366C9.46756 15.2054 9.23865 15.3002 8.99995 15.3002C8.76126 15.3002 8.53234 15.2054 8.36355 15.0366C8.19477 14.8678 8.09995 14.6389 8.09995 14.4002V9.9002H3.59995C3.36126 9.9002 3.13234 9.80537 2.96356 9.63659C2.79477 9.46781 2.69995 9.23889 2.69995 9.0002C2.69995 8.7615 2.79477 8.53258 2.96356 8.3638C3.13234 8.19502 3.36126 8.10019 3.59995 8.10019H8.09995V3.6002C8.09995 3.3615 8.19477 3.13258 8.36355 2.9638C8.53234 2.79502 8.76126 2.7002 8.99995 2.7002Z"
                    fill="white" />
            </svg>
        </button>
    </div> --}}

    <div class="tablenih" style="padding-top: -24px;">
        {{-- <embed class="p-3" id="pdf-viewer" src="{{ asset('asset/sop/meeting.pdf')  }}#toolbar=0" width="100%" height="900px" frameborder="0" type="application/pdf" print="none" toolbar="none"></embed> --}}
        {{-- <iframe id="pdf-viewer" src="{{ asset('asset/sop/narasi.pdf')  }}#toolbar=0" frameborder="0" width="100%" height="900px" ></iframe> --}}
        <div id="pdf-container"></div>
    </div>
@endsection

@section('custom-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
<script>
  const pdfUrl = "{{ asset('asset/sop/narasi.pdf')  }}";

  // Fungsi untuk merender PDF
  const renderPdf = async () => {
    const loadingTask = pdfjsLib.getDocument(pdfUrl);
    const pdf = await loadingTask.promise;

    // Loop melalui setiap halaman
    for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
      const page = await pdf.getPage(pageNum);
      const viewport = page.getViewport({ scale: 1.5 });

      // Buat sebuah canvas untuk merender halaman PDF
      const canvas = document.createElement('canvas');
      const context = canvas.getContext('2d');
      canvas.height = viewport.height;
      canvas.width = viewport.width;

      // Render halaman PDF ke canvas
      await page.render({
        canvasContext: context,
        viewport: viewport
      }).promise;

      // Dapatkan data gambar dalam bentuk URL
      const imageDataUrl = canvas.toDataURL('image/png');

      // Buat sebuah elemen gambar
      const img = document.createElement('img');
      img.src = imageDataUrl;
      img.alt = `Page ${pageNum}`;
      img.className = 'pdf-page'; // Tambahkan kelas untuk gaya CSS

      // Tambahkan elemen gambar ke dalam container
      document.getElementById('pdf-container').appendChild(img);
    }
  };

  renderPdf();
  //disable right click
  window.addEventListener('contextmenu', function (e) {
    e.preventDefault();
});
</script>
@endsection
