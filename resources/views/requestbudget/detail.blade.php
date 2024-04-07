@extends('layout.index')
@section('title')
    Budget Dashboard
@endsection
@section('content')
    <!--Badan Isi-->
    <div class="body" style="margin-top: 65px; margin-left: 132px">
        <div class="badanisi">
            <button class="navback">
                <svg xmlns="http://www.w3.org/2000/svg " width="10 " height="17 " viewBox="0 0 10 17 " fill="none ">
                    <path d="M0 8.0501C0 8.4501 0.2 8.8501 0.4 9.0501L7 15.6501C7.6 16.2501 8.6 16.2501 9.2 15.6501C9.8 15.0501 9.8 14.0501 9.2 13.4501L3.8 8.0501L9.2 2.6501C9.8 2.0501 9.8 1.0501 9.2 0.450097C8.6 -0.149902 7.6 -0.149902 7 0.450097L0.6 6.8501C0.2
                7.2501 0 7.6501 0 8.0501Z " fill="#4A25AA " />
                </svg>
                Back to Main Dashboard
            </button>
            <div class="tablenih" style="margin-bottom: 24px">
                <table class="table table-hover"
                    style="font: 300 16px Narasi Sans, sans-serif; width: 100%; margin-top: 12px; margin-bottom: 12px; text-align: center">
                    <thead style="font-weight: 500">
                        <tr class="dicobain">
                            <th scope="col ">NO</th>
                            <th scope="col ">Nama Barang</th>
                            <th scope="col ">Quatity</th>
                            <th scope="col ">Unit Price</th>
                            <th scope="col ">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row ">1</th>
                            <td>laptop</td>
                            <td>2</td>
                            <td></td>
                            <td class="total-price" style="font-weight: 300">$20</td>
                        </tr>
                        <tr>
                            <th scope=" row ">2</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="total-price" style="font-weight: 300">$20</td>
                        </tr>
                        <tr>
                            <th scope="row ">3</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="total-price" style="font-weight: 300">$20</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right" style="font-weight: 500; background-color: #dbdee8">Total
                            </td>
                            <td class="total-price">$80</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form onsubmit="addVendor(event)" action="" class="formrequest">
                <div class="mb-3">
                    <label for="vendor" class="form-label">Vendor</label>
                    <div style="justify-content: space-between; display: flex; align-self: center">
                        <div id="inputvendor" style="width: 100%">
                            <select class="form-select" id="vendor-0" onchange="handleChange(event, 0)">
                                <option value="" selected>Select vendor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="garisbutton" style="margin-top: -12px">
                    <button type="button" class="garisbutton" onclick="addVendor(event) ">Tambah Vendor</button>
                </div>
            </form>
            <form onsubmit="addBudgetPrice(event)" action="" class="formrequest">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr; margin-bottom: 12px">
                        <div class="mb-3">
                            <label for="budget" class="form-label">Budget</label>
                            <div style="justify-content: space-between; display: flex; align-self: center">
                                <div id="inputbudget" style="width: 100%">
                                    <select class="form-select" id="budget-0" onchange="handleChangeBudget(event, 0)">
                                        <option value="" selected>Select Budget</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <div style="justify-content: space-between; display: flex; align-self: center">
                                <div id="inputprice" style="width: 100%">
                                    <select class="form-select" id="price-0" onchange="handleChangePrice(event, 0)">
                                        <option value="" selected>Select Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="garisbutton" style="margin-top: -12px">
                    <button type="button" class="garisbutton" onclick="addBudgetPrice(event) ">Tambah Budget dan
                        Price</button>
                </div>
            </form>

            <div class="button-request">
                <button type="submit " class="button" style="color: white">Request</button>
            </div>
        </div>
    </div>
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
