var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        url: '',
        product_id: ''
    },
    methods: {
        greet: function(event) {
            var res = event.target.value.split("|");
            this.url = res[0];
            this.product_id = res[1];
        }
    },
    computed: {
        // a computed getter
        link: function() {
            return this.url;
        },
        id: function() {
            return this.product_id;
        }
    }
});