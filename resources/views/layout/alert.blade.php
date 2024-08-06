{{--  --}}
<style>
  .custom-modal .modal-content {
      border-radius: 8px;
      width: auto;
      background: white;
  }
  .custom-modal .modal-body {
      display: flex;
      justify-content: space-between;
      align-items: center;
  }
  .custom-modal .btn {
      width: auto;
      padding: 8px 16px; /* Adjust padding as needed */
      white-space: nowrap; 
      /* Prevent text from wrapping */
  }
</style>


<!-- The Modal 1 -->
<div class="modal fade top position-absolute top-0 start-50 translate-middle-x custom-modal" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog  modal-top">
  <div class="modal-content">
    <!-- Modal Body -->
    <div class="modal-body d-flex justify-content-between align-items-center">
      <div>
          <p style="font-weight: 300">{{ session('status') }}</p>
      </div>
      <div>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" style="font-weight: 300">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


{{-- The Modal 2 --}}
<div class="modal fade top position-absolute top-0 start-50 translate-middle-x custom-modal" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-top">
    <div class="modal-content">
      <!-- Modal Body -->
      <div class="modal-body d-flex justify-content-between align-items-center" style="gap: 12px">
        <div>
            <p style="font-weight: 300">{{ session('error') }}</p>
        </div>
        <div >
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="font-weight: 300">Try Again</button>
        </div>
      </div>
    </div>
  </div>
</div>
