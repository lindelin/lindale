<script>
    import Swal from 'sweetalert2'
    import Router from "./Router";
    export default {
        name: "ErrorHandler",
        mixins: [Router],
        data: function () {
            return {
                errors: {},
                notification: Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        },
        methods: {
            handleErrorStatusCodes: function (error) {
                if (error.response) {
                    switch (error.response.status) {
                        case 401:
                            this.UnauthenticatedHandle();
                            break;
                        case 403:
                            this.showErrorPopup(this.trans.get('errors.authorization-error'),
                                this.trans.get('errors.authorization-message'), 'warning');
                            break;
                        case 422:
                            this.showErrorPopup(this.trans.get('errors.input-invalid'),
                                this.trans.get('errors.input-invalid-message'));
                            this.errors = error.response.data.errors;
                            break;
                        default:
                            this.systemErrorHandle(error.response.status);
                            break;
                    }
                }
            },
            hasErrors: function (key) {
                return this.errors[key] ? this.errors[key] : [];
            },
            clearErrors: function () {
                this.errors = {};
            },
            showIndicator: function (message = 'Loading...') {
                Swal.fire({
                    title: message,
                    text: this.trans.get('errors.wait'),
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                    imageUrl: '/img/logo.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Logo',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            },
            hideIndicator: function () {
                Swal.close();
            },
            showSuccessPopup: function (message = null, type = 'success') {
                Swal.fire({
                    title: message,
                    type: type,
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            showErrorPopup: function (title, message = null, type = 'error') {
                Swal.fire({
                    type: type,
                    title: title,
                    text: message,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            },
            UnauthenticatedHandle: function () {
                Swal.fire({
                    title: this.trans.get('errors.auth-error'),
                    text: this.trans.get('errors.session-error'),
                    type: 'warning',
                    confirmButtonColor: '#1268cc',
                    confirmButtonText: this.trans.get('auth.login'),
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    location.href = this.route.login;
                })
            },
            systemErrorHandle: function (code) {
                this.showErrorPopup(this.trans.get('errors.system-error'),
                    this.trans.get('errors.system-error-message', { code: code }));
            },
            notify: function (message, type = 'info') {
                this.notification.fire({
                    type: type,
                    title: message
                })
            }
        }
    }
</script>