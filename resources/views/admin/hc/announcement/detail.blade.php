@extends('admin.layout.app')

@section('title')
    Detail Announcement  - Admin HC
@endsection
@section('costum-css')
<style>

    h1{
        text-shadow: 0.2vmin 0.2vmin 0 #999999;
    }
    
    .headerone {
            position: relative;
            text-align: start;
            background: url('{{ asset('asset/image/bannernarasi.jpeg') }}');
            background-repeat: no-repeat;
            background-size: cover; /* Membuat gambar memenuhi seluruh elemen */
            /* background-position: center -70px; */
            color: white;
            margin-top: 70px;
            overflow: hidden;
        }
    
        .headerone::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(74, 37, 170, 0.7); /* Overlay with #4a25aa color and 70% opacity */
            z-index: 1;
        }
    
    .inner-header {
      height:25vh;
      width:100%;
      margin: 0;
      z-index: 2;
      padding: 32px;
    }
    
    .flex { /*Flexbox for containers*/
      display: flex;
      justify-content: start;
      align-items: center;
      text-align: start;
      z-index: 2;
    }
    
    .waves {
      position:relative;
      width: 100%;
      height:15vh;
      min-height:70px;
      z-index: 2;
      max-height:100px;
    }
    
    .wkwk {
        color: #ffe900;
    
        font: 400 16px Narasi Sans, sans-serif;
        letter-spacing: 1px;
        z-index: 2;
    }
    
    .wikwik {
    
        color: #ffe900;
        font: 400 16px Narasi Sans, sans-serif;
        letter-spacing: 1px;
        z-index: 2;
    }
    .indie{
        font-style: italic;
        color:#bababa;
        margin-top:-8px;
    }
    
    .apaniha{
        color: black;
    }
    .apaniha:hover{
        color: #4a25aa;
        text-decoration: none;
    
    }
    .apaniha:hover svg path {
        fill: #4a25aa;
    }
    
    
    .buttonannouncemain {
        display: flex;
        padding: 16px 24px;
        gap: 8px;
        border-radius: 8px;
        border: none;
        background: var(--Primary-Main, #4a25aa);
        color: #ffe900;
        font: 600 16px Narasi Sans, sans-serif;
        box-shadow: 0px 4px 24px -1px rgba(74, 37, 170, 0.2);
        width: 100%;
        text-decoration: none;
        justify-content: center;
        margin-top: 16px
    }
    
    .buttonannouncemain:hover {
        background: #34128c;
    
    }
    
    .header-unique {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .profile-info-unique {
        display: flex;
        align-items: center;
        gap: 10px; /* Add gap between icon and text */
    }
    
    .profile-info-unique i {
        font-size: 40px;
        color: #007bff;
    }
    
    .text-info-unique {
        line-height: 1.2;
    }
    
    .date-unique {
        font-size: 0.9em;
        color: #888;
        white-space: nowrap; /* Prevent date from wrapping */
    }
    
    .content-unique {
        margin-top: 24px;
        margin-bottom: 32px
    }
    .content-unique a {
        word-wrap: break-word;
        word-break: break-all;
        overflow-wrap: anywhere;
    }
    
    @media (max-width: 576px) {
        .content-unique a {
            font-size: 14px; /* Smaller font size for mobile for better fit */
        }
    }
    
    
    .content-unique strong {
        display: block;
        font-size: 1.2em;
        margin-bottom: 16px;
    }
    
    .badge-unique {
        background-color: #ece4ff;
        color: #4a25aa;
        font-size: 0.8em;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 15px;
        margin-bottom: 10px;
        display: inline-block;
    }
    
    .attachment-unique {
        display: flex;
        align-items: center;
        margin-top: 20px;
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }
    
    .attachment-unique i {
        font-size: 1.5em;
        color: #4a25aa;
        margin-right: 10px;
    }
    
    .attachment-unique a {
        color: #4a25aa;
        text-decoration: none;
    }
    
    .file-container {
          display: flex;
          align-items: center;
          border: 1px solid #e0e0e0;
          border-radius: 5px;
          height:48px;
          max-width: 400px;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    
     a img{
        border-radius: 12px;
        width: 100%;
        /* max-height: 400px; */
    }
    
        .file-icon {
          background-color: #4a25aa;
          padding: 10px;
          border-radius: 5px 0 0 5px;
          display: flex;
          align-items: center;
          justify-content: center;
          height:100%;
        }
    
        .file-icon i {
          color: white;
          font-size: 24px;
        }
    
        .file-info {
          flex-grow: 1;
          padding-left: 10px;
          display: flex;
          align-items: center;
          display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    
        }
    
        .file-info span {
          font-size: 16px;
          color: #333;
    
    
    
        }
    
        .file-download {
          margin-left: auto;
          padding-right: 10px;
        }
    
        .file-download svg {
          font-size: 18px;
          color: #cfcfcf;
          cursor: pointer;
        }
    
        .file-download i:hover {
          color: #333;
        }
    
    
    
    /*Shrinking for mobile*/
    .responsive-container {
        display: inline-flex;
        vertical-align: middle;
    }
    
    /* On mobile screens (max-width: 576px), stack wikwik below wkwk */
    @media (max-width: 576px) {
        .responsive-container {
            flex-direction: column; /* Stacks the divs vertically */
        }
    }
    
    @media (max-width: 768px) {
      .waves {
        height:40px;
        min-height:40px;
      }
    
    
      h1 {
        font-size:24px;
      }
      .wikwik {
        font-size:12px;
        text-align: start;
      }
    }
    @media (max-width: 991px) {
      .buttonannouncemain {
    margin-bottom: 24px;
    
      }
    
    
    }
    .oyoy{
        width: 112px; height: 112px; margin-right: 32px; z-index: 2;
    }
    @media (max-width: 576px) {
      .oyoy {
        width: 56px; 
        height: 56px; 
      }
    }
    
    /* Mobile styles: for screen widths 576px or smaller */
    @media (max-width: 576px) {
        .apaniha p {
            padding-top: 4px;
            font-size: 14px; /* Adjust this size as per your requirement */
        }
    }
    
            </style>
@endsection
@section('content')
    <!--Badan Isi-->
    <a href="{{ route('request-budget-department.advance.index') }}" style="text-decoration: none">
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


    <div class="tablenih p-4">
        <div class="header-unique">
            <div class="profile-info-unique align-middle">
                <i class="fas fa-user-circle" style="color: #cfcfcf"></i>
                <div class="text-info-unique">
                    <strong>User Name</strong><br>
                    <span>User Role</span>
                </div>
            </div>
            <div class="date-unique">Date Placeholder</div>
        </div>
    
        <div class="content-unique">
            <div class="row">
                <div class="col">
                    <span class="badge-unique">Category Name</span>
                </div>
                <div class="col">
                    <span style="display: flex; gap: 2px; justify-content:right">
                        <a type="button" class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modal-edit-announcement">
                            Edit
                        </a>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmDelete()">Delete</button>
                    </span>
                </div>
                @include('admin.hc.announcement.modal_edit_announcement')
            </div>
    
            <strong>Announcement Title</strong>
    
            <p>
                Announcement content goes here.
            </p>
        </div>
    
        <div class="">
            <div class="image-container text-center mb-2">
                <a data-fancybox="gallery" href="path/to/image.jpg">
                    <img src="path/to/image.jpg" class="img-fluid" alt="Image" style="cursor:pointer; width:50%;">
                </a>
            </div>
    
            <div class="col mb-2">
                <a href="path/to/file.pdf" style="text-decoration: none" download>
                    <div class="file-container">
                        <div class="file-icon">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="file-info">
                            <span>File Name.pdf</span>
                        </div>
                        <div class="file-download">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
@endsection


@section('modal')
@endsection
@section('custom-js')

@endsection
