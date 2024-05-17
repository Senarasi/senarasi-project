@extends('layout.index')

@section('title')
    Detail Request Budget - Budgeting System
@endsection

@section('content')
    <!--Badan Isi-->
    <a href="/detail-budget" style="text-decoration: none">
    <button class="navback">
        <svg xmlns="http://www.w3.org/2000/svg " width="10" height="17 " viewBox="0 0 10 17 " fill="none ">
          <path
            d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
      7.2501 0 7.6501 0 8.0501Z "
            fill="#4A25AA "
          />
        </svg>
        Back to Detail Budget
      </button>
    </a>

    <form action="#">
        <div class="tablenih">
            <div style="justify-content: space-between; display: flex; margin-left: 12px; margin-right: 12px; margin-top: 12px; margin-bottom: 24px;">
                <div>
                    <div>
                        <p style="font: 400 16px Narasi Sans, sans-serif; color: #4A25AA; margin-left: 2px;">Request Number</p>
                        <div class="judulhalaman " style="text-align: start; margin-top: -16px; ">NRS129/2024</div>
                    </div>
                    <!-- <div style="margin-top: -24px;">
                        <div class="keteranganbudget">
                            <div class="tunggu">
                                <span style="font: 500 16px Narasi Sans, sans-serif;" class="text-center">EVENT</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="arips">
                        <div style="font: 400 16px Narasi Sans, sans-serif; color: black ">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Nama Submit</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Bang Johnes</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Produser</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Julius</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Manager</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Julius</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cobalagi" style="font: 400 16px Narasi Sans, sans-serif; color: black;">
                            <table class="tablecoba ">
                                <tbody>
                                    <tr>
                                        <td>Nama Program</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>Mata Najwa</td>

                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>28-10-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Selesai</td>
                                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                        <td>28-10-2023</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="button-approv">
                        <button type="edit " class="btn btn-success " style="color: white; padding: 12px 24px; margin-right: 8px ">Edit</button>
                        <button type="delete " class="btn btn-danger " style="color: white; padding: 12px 24px ">Delete</button>
                    </div>
                    <div style="margin-top: -24px; ">
                        <button type="download" class="button-export" style="color: white;">Export to PDF</button>
                    </div>



                </div>


            </div>

            <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; margin-bottom: 24px; margin-top: -24px;">
                <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center ">
                    <thead style="font-weight: 500 ">
                        <tr class="dicobain ">
                            <th scope="col ">NO</th>
                            <th scope="col ">Description</th>
                            <th scope="col ">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row ">1</th>
                            <td style="text-align: start">

                                SUB TOTAL PRODUCTION CREWS</td>

                            <td class="total-price " style="font-weight: 300 ">$20</td>
                        </tr>
                        <tr>
                            <th scope=" row ">2</th>
                            <td style="text-align: start"></td>

                            <td class="total-price " style="font-weight: 300 ">$20</td>
                        </tr>
                        <tr>
                            <th scope="row ">3</th>
                            <td style="text-align: start"></td>

                            <td class="total-price " style="font-weight: 300 ">$20</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right " style="font-weight: 500; background-color: #dbdee8 ">Total</td>
                            <td class="total-price ">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="keteranganbudget" style="margin-left: 12px;">
                <div class="tunggu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="12" fill="#FFE900"/>
                  </svg><span class="text-center">menunggu approval</span>
                </div>
                <div class="tolak">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="12" fill="#E73638"/>
                  </svg><span class="text-center">approval ditolak</span>
                </div>
                <div class="diterima">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="12" fill="#009579"/>
                  </svg><span class="text-center">approval disetujui</span>
                </div>
            </div>


            <div style="border: 1px solid #c4c4c4;margin: 12px; border-radius: 4px; ">
                <table class="table table-hover " style="font: 300 16px Narasi Sans, sans-serif;width: 100% ; margin-top: 12px; margin-bottom: 12px; text-align: center; ">
                    <thead style="font-weight: 500; ">
                        <tr class="dicobain ">
                            <th scope="col ">Approval 1</th>
                            <th scope="col ">Approval 2</th>
                            <th scope="col ">Approval 3</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><svg xmlns="http://www.w3.org/2000/svg " width="24 " height="24 " viewBox="0 0 24 24 " fill="none ">
                            <circle cx="12 " cy="12 " r="12 " fill="#E73638 "/>
                          </svg></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>

    </form>
@endsection

@section('custom-js')
    <script>
        const array = [{
            vendor: '',
            budget: '',
            price: '',
            deleteButtonIndex: 0,
        }, ];

        const generateVendor = () => {
            const inputVendor = document.getElementById('inputvendor');
            inputVendor.innerHTML = array
                .map((item, index) => {
                    return `
              <div class="mb-3 " style="justify-content: space-between; display: flex; align-self: center ">
                <select class="form-select " id="vendor-${index} " onchange="handleChange(event, ${index}) ">
                  <option value=" " ${index === 0 ? 'selected' : ''}>${item.vendor || '(no vendor)'}</option>
                  ${array
                    .slice(1)
                    .map((option, i) => `<option value="${i} ">${option.vendor || '(no vendor)'}</option>`)
                    .join('')}
                </select>
                <button type="button"   class="button-general " style="margin-left:12px; " onclick="deleteVendor(${item.deleteButtonIndex}) ">Delete</button>
              </div>
            `;
                })
                .join('');
        };

        const generateBudgetPrice = () => {
            const inputBudget = document.getElementById('inputbudget');
            const inputPrice = document.getElementById('inputprice');
            inputBudget.innerHTML = array
                .map((item, index) => {
                    return `
        <select class="form-select" id="budget-${index}" onchange="handleChangeBudget(event, ${index})">
          <option value="" ${index === 0 ? 'selected' : ''}>${item.budget || '(no budget)'}</option>
          ${array
            .slice(1)
            .map((option, i) => `<option value="${i}">${option.budget || '(no budget)'}</option>`)
            .join('')}
        </select>
      `;
                })
                .join('');

            inputPrice.innerHTML = array
                .map((item, index) => {
                    return `
        <select class="form-select" id="price-${index}" onchange="handleChangePrice(event, ${index})">
          <option value="" ${index === 0 ? 'selected' : ''}>${item.price || '(no price)'}</option>
          ${array
            .slice(1)
            .map((option, i) => `<option value="${i}">${option.price || '(no price)'}</option>`)
            .join('')}
        </select>
        <button type="button " class="button-general " style="margin-left:12px; " onclick="deleteBudgetPrice(${item.deleteButtonIndex}) ">Delete</button>
      `;
                })
                .join('');
        };


        const addVendor = (e) => {
            e.preventDefault();
            const newIndex = array.length;
            array.push({
                vendor: '',
                deleteButtonIndex: newIndex,
            });
            generateVendor();
        };

        const addBudgetPrice = (e) => {
            e.preventDefault();
            const newIndex = array.length;
            array.push({
                budget: '',
                price: '',
                deleteButtonIndex: newIndex,
            });
            generateBudgetPrice();
        };

        const handleChange = (e, index) => {
            array[index].vendor = e.target.value;
            document.getElementById(`vendor-${index}`).value = e.target.value;
        };

        const handleChangeBudget = (e, index) => {
            array[index].budget = e.target.value;
            document.getElementById(`budget-${index}`).value = e.target.value;
        };

        const handleChangePrice = (e, index) => {
            array[index].price = e.target.value;
            document.getElementById(`price-${index}`).value = e.target.value;
        };

        const deleteVendor = (deleteButtonIndex) => {
            if (deleteButtonIndex === 0) {
                array[0].vendor = '';
            } else {
                const vendorIndex = array.findIndex((item) => item.deleteButtonIndex === deleteButtonIndex);
                if (vendorIndex !== -1 && array.length > 1) {
                    array.splice(vendorIndex, 1);
                }
            }
            generateVendor();
        };

        const deleteBudgetPrice = (deleteButtonIndex) => {
            if (deleteButtonIndex === 0) {
                array[0].budget = '';
                array[0].price = '';
            } else {
                const budgetPriceIndex = array.findIndex((item) => item.deleteButtonIndex === deleteButtonIndex);
                if (budgetPriceIndex !== -1 && array.length > 1) {
                    array.splice(budgetPriceIndex, 1);
                }
            }
            generateBudgetPrice();
        };

        generateBudgetPrice();
        generateVendor();
    </script>
@endsection
