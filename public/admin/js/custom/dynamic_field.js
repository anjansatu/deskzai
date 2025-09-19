(function ($) {
    "use strict";
    $(document).ready(function () {
        var rowCount = $('#fieldCount').val() != 0?$('#fieldCount').val():0;
        // Add row button click event

        var TEXT_FIELD_ID = $('#TEXT_FIELD_ID').val();
        var TEXTAREA_FIELD_ID = $('#TEXTAREA_FIELD_ID').val();
        var REQUIRED_NO = $('#REQUIRED_NO').val();
        var REQUIRED_YES = $('#REQUIRED_YES').val();

        $("#addRowBtn").click(function () {
            var newRow = ` <tr>
                                  <td>
                                                <select class="form-control" name="type[]">
                                                    <option value="${TEXT_FIELD_ID}">Text</option>
                                                    <option value="${TEXTAREA_FIELD_ID}">Textarea</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="level[]" value="" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" name="placeholder[]" value="" class="form-control">
                                            </td>
                                              <td>
                                                <select class="form-control" name="required[]">
                                                    <option></option>
                                                    <option value="${REQUIRED_NO}">No</option>
                                                    <option value="${REQUIRED_YES}">Yes</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="width[]" value="" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" name="order[]" value="" class="form-control">
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex align-items-center justify-content-center text-red"><i class="fa fa-trash df-delete-btn-disable removeBtn"></i></div>
                                                </div>
                                            </td>
                                        </tr>`;
            $("#myTable tbody").append(newRow);
            // $('.df-submit-btn').removeClass('d-none');
            rowCount++;
        });
        // Remove row button click event
        $(document).on("click", ".removeBtn", function () {
            $(this).closest("tr").remove();
                rowCount --;
            if(rowCount == 0){
                // $('.df-submit-btn').addClass('d-none');
            }
        });
    });

    function dynamicFieldResponse(response) {
        $('.error-message').remove();
        $('.is-invalid').removeClass('is-invalid');
        if (response['status'] === true) {
            toastr.success(response['message']);
            if ($('.dataTable ').length) {
                $('.dataTable').DataTable().ajax.reload();
            }
            // $('.df-submit-btn').addClass('d-none');
        } else {
            commonHandler(response)
        }
    }
    window.dynamicFieldResponse =dynamicFieldResponse;
})(jQuery)



