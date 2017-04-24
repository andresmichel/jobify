<script type="text/javascript">
    new Vue({
        el: '#remoteApp',
        data: {
            remote: false
        },
        watch: {
            remote: function (val) {
                if (! val) {
                    $('[name="state"]').show();
                    $('[name="city"]').show();
                    $('[for="state"]').show();
                    $('[for="city"]').show();
                } else {
                    $('[name="state"]').hide();
                    $('[name="city"]').hide();
                    $('[for="state"]').hide();
                    $('[for="city"]').hide();
                }
            }
        },
        mounted: function () {
            this.remote = {{ isset($remote) && $remote ? 'true' : 'false' }};
        }
    });
</script>
