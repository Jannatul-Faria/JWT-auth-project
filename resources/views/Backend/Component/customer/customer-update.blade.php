<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerNameUpdate">

                                <label class="form-label mt-3">Customer Email *</label>
                                <input type="text" class="form-control" id="customerEmailUpdate">

                                <label class="form-label mt-3">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobileUpdate">

                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-info">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        // alert(id);
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/id-customer", {
            id: id
        })
        hideLoader();
        document.getElementById('customerNameUpdate').value = res.data['name'];
        document.getElementById('customerEmailUpdate').value = res.data['email'];
        document.getElementById('customerMobileUpdate').value = res.data['mobile'];
    }


    async function Update() {
        let customerNameUpdate = document.getElementById('customerNameUpdate').value;
        let customerEmailUpdate = document.getElementById('customerEmailUpdate').value;
        let customerMobileUpdate = document.getElementById('customerMobileUpdate').value;
        let customerId = document.getElementById('updateID').value;
        if (customerNameUpdate.length === 0) {
            errorToast("customer name Required!")
        }
        if (customerEmailUpdate.length === 0) {
            errorToast("customer email Required!")
        }
        if (customerMobileUpdate.length === 0) {
            errorToast("customer mobile Required!")
        } else {
            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post("/update-customer", {
                name: customerNameUpdate,
                email: customerEmailUpdate,
                mobile: customerMobileUpdate,
                id: customerId
            })
            hideLoader();

            if (res.status == 200 && res.data === 1) {
                successToast(" Update Successfully!")
                await getList();
            } else {
                errorToast("Update Failled!")
            }
        }

    }
</script>
