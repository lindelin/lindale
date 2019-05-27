<script>
    export default {
        name: "Colors",
        methods: {
            bgColor: function (id = null) {
                switch (id) {
                    case 1:
                        return 'bg-primary';
                    case 2:
                        return 'bg-primary';
                    case 3:
                        return 'bg-success';
                    case 4:
                        return 'bg-info';
                    case 5:
                        return 'bg-warning';
                    case 6:
                        return 'bg-danger';
                    default:
                        return 'bg-primary';
                }
            },
            textColor: function (id = null) {
                switch (id) {
                    case 1:
                        return 'text-dark';
                    case 2:
                        return 'text-primary';
                    case 3:
                        return 'text-success';
                    case 4:
                        return 'text-info';
                    case 5:
                        return 'text-warning';
                    case 6:
                        return 'text-danger';
                    default:
                        return 'text-primary';
                }
            },
            btnColor: function (id = null) {
                switch (id) {
                    case 1:
                        return 'btn-dark';
                    case 2:
                        return 'btn-primary';
                    case 3:
                        return 'btn-success';
                    case 4:
                        return 'btn-info';
                    case 5:
                        return 'btn-warning';
                    case 6:
                        return 'btn-danger';
                    default:
                        return 'btn-primary';
                }
            },
            btnOutlineColor: function (id = null) {
                switch (id) {
                    case 1:
                        return 'btn-outline-secondary';
                    case 2:
                        return 'btn-outline-primary';
                    case 3:
                        return 'btn-outline-success';
                    case 4:
                        return 'btn-outline-info';
                    case 5:
                        return 'btn-outline-warning';
                    case 6:
                        return 'btn-outline-danger';
                    default:
                        return 'btn-outline-primary';
                }
            },
            todoAction: function (id) {
                switch (id) {
                    case 1:
                        return 'spinner';
                    case 2:
                        return 'check';
                    case 3:
                        return 'circle-notch';
                    case 4:
                        return 'star';
                    default:
                        return '';
                }
            }
        }
    }
</script>