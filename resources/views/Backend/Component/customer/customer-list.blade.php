<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Customer</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal"
                            class="float-end btn m-0 bg-gradient-info">Create</button>
                    </div>
                </div>
                <hr class="bg-info" />
                <table class="table" id="tableData">
                    <thead>
                        <tr class="text-dark bg-info bg-lighten-xl ">
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    getList();

    async function getList() {
        showLoader();
        let res = await axios.get("/list-customer");
        hideLoader();

        let tableData = $('#tableData');
        let tableList = $('#tableList');

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function(item, index) {
            let row = `<tr>
                        <td>${index+1}</td>
                        <td>${item['name']}</td>
                        <td>${item['email']}</td>
                        <td>${item['mobile']}</td>
                        <td>
                            <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-info ">Edit</button>
                            <button data-id="${item['id']}" class="btn deleteBtn btn-outline-danger btn-sm">Delete</button>

                        </td>
                    </tr>`

            tableList.append(row)
        })


        new DataTable('#tableData', {
            order: [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20, 30]
        });

        $('.deleteBtn').on('click', async function() {
            let id = $(this).data('id');
            $('#delete-modal').modal('show');
            $('#deleteID').val(id);
        })

        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            await FillUpUpdateForm(id)
            $("#update-modal").modal('show');
        })
    }
</script>
