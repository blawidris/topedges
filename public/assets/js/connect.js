

let _token = $("input[name='_token']").val();

console.log(_token)
let request = function () {

    let getFormData = function (form) {
        return $('#' + form).serializeArray().reduce(function (obj, item) {
            obj[item.name] = item.value;

            return obj;
        }, {});
    };

    let makeJsonRequest = function (url, data, type = 'POST') {
        return $.ajax({
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: url,
            method: type,
            data: JSON.stringify(data)
        });
    }

    let readFile = function () {
        if (this.files && this.files[0]) {
            let FR = new FileReader();
            FR.onload = function (e) {
                $('#file_image').val(e.target.result);
            };
            FR.readAsDataURL(this.files[0]);
        }
    };

    let uploadFile = function (formData, url) {
        return $.ajax({
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: url,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        });
    };

    showToast = function (type, text) {
        'use strict';
        $.toast({
            heading: type,
            text: text,
            showHideTransition: 'slide',
            icon: type,
            loaderBg: (type == 'danger') ? '#f2a654' : (type == 'success') ? '#f96868' : '#57c7d4',
            position: 'top-right'
        })
    };

    let makeRequest = function (url, data, type) {
        return $.ajax({
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: url,
            method: type,
            data: data
        });

    }

    return {

        login: function (form) {
            let l = Ladda.create(document.querySelector('#loginBtn'));
            l.start();

            form_data = getFormData(form);

            let response = makeJsonRequest('/api/member/login', form_data, 'POST');
            response.done(function (data) {
                l.stop();

                if (data.status.code === 200) {
                    toastr_sucess('Success', data.status.message);
                    window.location.href = 'dashboard';
                } else {
                    toastr_warning('Warning', data.status.message)
                }
            });

            response.fail(function () {
                l.stop();

                toastr_error('An error occured, please try again', 'Error');

            });
        },

        register: function (form) {
            let l = Ladda.create(document.querySelector('#addAdmin'));
            l.start()

            let form_data = getFormData(form);
            let response = makeJsonRequest('/api/member/add', form_data, "POST");

            response.done(function (data) {
                l.stop()

                if (data.status.code === 200) {
                    toastr_sucess('Success', data.status.message)
                } else {
                    toastr_warning('Warning', data.status.message);
                }
            });

            response.fail(function () {
                l.stop()
                toastr_error('An error ocurred, please try again')
            })
        },

        save: function (form, button, url, type = "POST", gotoUrl) {

            let l = Ladda.create(document.querySelector('#' + button));
            l.start();

            let form_data = getFormData(form);

            // console.log(form_data)
            let response = makeJsonRequest(url, form_data, type);
            gotoUrl = window.location.href
            response.done(function (data) {
                l.stop();
                console.log(data)

                // if (data.status.code === 200) {
                //     showToast(data.status.message, 'Success');
                //     window.location.href = gotoUrl;
                // } else {
                //     toastr_warning(data.status.message, 'Warning');
                // }
            });

            response.fail(function () {
                l.stop()
                toastr_error('An error occured, please try again', 'Error!')
            })
        },

        setImageData: function (id) {
            if ($('#' + id).length > 0) {
                document.getElementById(id).addEventListener('change', readFile, false);
            }
        },

        deletePost: function (id, url) {
            let l = Ladda.create(document.querySelector('#deleteBtn'));
            l.start();

            let form_data = { 'book_id': id };

            console.log(form_data)
            let response = makeJsonRequest(url, form_data, 'DELETE');

            response.done(function (data) {
                l.stop();
                if (data.status.code === 200) {
                    toastr_sucess(data.status.message, 'Success');
                    window.location.href = gotoUrl;
                } else {
                    toastr_warning(data.status.message, 'Warning');
                }
            });

            response.fail(function () {
                l.stop()
                toastr_error('An error occured, please try again', 'Error!')
            })
        },

        filter_category: function (id) {
            let s = '?category=';
            let category = $('#' + id).data('name');

            // console.log(min)
            if (category) {
                s += category;
            }

            if (s) {
                window.location.href = s;
            } else {
                window.location.href = 'shop';
            }

        },



    }
}();

jQuery(document).ready(function () {

});