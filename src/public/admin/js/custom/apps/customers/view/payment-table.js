"use strict";

// Class definition
var KTCustomerViewPaymentTable = (function () {
    // Define shared variables
    var datatable;
    var table = document.querySelector("#kt_table_customers_payment");

    // Private functions
    var initCustomerView = function () {
        // Set date data order
        const tableRows = table.querySelectorAll("tbody tr");

        tableRows.forEach((row) => {
            const dateRow = row.querySelectorAll("td");
            const realDate = moment(
                dateRow[3].innerHTML,
                "DD MMM YYYY, LT"
            ).format(); // select date from 4th column in table
            dateRow[3].setAttribute("data-order", realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            info: false,
            order: [],
            pageLength: 5,
            lengthChange: false,
            columnDefs: [
                { orderable: false, targets: 4 }, // Disable ordering on column 5 (actions)
            ],
        });
    };

    // Delete customer
    var deleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll(
            '[data-kt-customer-table-filter="delete_row"]'
        );

        deleteButtons.forEach((d) => {
            // Delete button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                let trans_id = d.getAttribute("data-transaction");
                let customer_id = d.getAttribute("data-customer");

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const invoiceNumber =
                    parent.querySelectorAll("td")[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text:
                        "Are you sure you want to delete " +
                        invoiceNumber +
                        "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        fetch(
                            `${hostUrl}/customer/${customer_id}/wallet/${trans_id}`,
                            {
                                headers: {
                                    "X-CSRF-TOKEN": _token,
                                    "Content-Type": "application/json",
                                    accept: "application/json",
                                },
                                method: "DELETE",
                            }
                        )
                            .then((response) => response.json())
                            .then((result) => {
                                if (result.status == 200) {
                                    Swal.fire({
                                        text:
                                            "You have deleted " +
                                            invoiceNumber +
                                            "!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    })
                                        .then(function () {
                                            // Remove current row
                                            datatable
                                                .row($(parent))
                                                .remove()
                                                .draw();
                                        })
                                        .then(function () {
                                            // Detect checked checkboxes
                                            toggleToolbars();
                                        });

                                    location.reload();
                                }
                            });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            },
                        });
                    }
                });
            });
        });
    };

    //  Approve customer
    var approveRows = () => {
        // Select all delete buttons
        const approveButtons = table.querySelectorAll(
            '[data-kt-customer-table-filter="approve_row"]'
        );

        console.log(approveButtons);

        approveButtons.forEach((d) => {
            // Approve button on click
            d.addEventListener("click", function (e) {
                e.preventDefault();

                let trans_id = d.getAttribute("data-transaction");
                let customer_id = d.getAttribute("data-customer");

                // Select parent row
                const parent = e.target.closest("tr");

                // Get customer name
                const invoiceNumber =
                    parent.querySelectorAll("td")[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text:
                        "Are you sure you want to approve " +
                        invoiceNumber +
                        "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, approve!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary",
                    },
                }).then(function (result) {
                    if (result.value) {
                        fetch(
                            `${hostUrl}/customer/${customer_id}/wallet/${trans_id}`,
                            {
                                headers: {
                                    "X-CSRF-TOKEN": _token,
                                    "Content-Type": "application/json",
                                    accept: "application/json",
                                },
                                method: "PUT",
                            }
                        )
                            .then((response) => response.json())
                            .then((result) => {
                                if (result.status == 200) {
                                    Swal.fire({
                                        text:
                                            "You have approved " +
                                            invoiceNumber +
                                            "!.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                                "btn fw-bold btn-primary",
                                        },
                                    });

                                    location.reload();
                                }
                            });
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            },
                        });
                    }
                });
            });
        });
    };

    // Public methods
    return {
        init: function () {
            if (!table) {
                return;
            }

            initCustomerView();
            approveRows();
            deleteRows();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTCustomerViewPaymentTable.init();
});
