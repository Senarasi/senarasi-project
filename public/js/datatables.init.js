$(document).ready(function () {
  $('#datatable').DataTable({

    "language": {
      //   "sProcessing":   "Sedang memproses...",
      //   "sLengthMenu":   "Tampilkan _MENU_ data",
      //   "sZeroRecords":  "Belum ada data.",
      //   "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
      //   "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
      //   "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
      //   "sInfoPostFix":  "",
      //   "sSearch":       "Cari:",
      //   "sUrl":          "",
        "oPaginate": {
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 320 512"><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>',
            "sNext":     '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 320 512"><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>',
        },

    },
    "drawCallback": function drawCallback() {
      $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
    }
  }); //Buttons example

  $('#datatablerequest').DataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "language": {
          //   "sProcessing":   "Sedang memproses...",
          //   "sLengthMenu":   "Tampilkan _MENU_ data",
          //   "sZeroRecords":  "Belum ada data.",
          //   "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          //   "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
          //   "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
          //   "sInfoPostFix":  "",
          //   "sSearch":       "Cari:",
          //   "sUrl":          "",
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 320 512"><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>',
                "sNext":     '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 320 512"><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>',
            },

        },
        "drawCallback": function drawCallback() {
          $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
      }); //Buttons example

/******/ });
