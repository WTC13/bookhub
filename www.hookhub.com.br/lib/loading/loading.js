function Loading(obj) {
    this.obj = {
        'position': obj.position.toLowerCase() || 'bottom',
        'color': obj.color || '#00bfeb',
        'timeout': {
            'message': obj.setMessage || 1 * (5 * 1000),
            'initMessage': obj.setMessage ? obj.setMessage / 2 : 1 * (2.5 * 1000)
        },
        'imageSrc': null,
        'messages': obj.messages || []
    }
    this.isHide = true;
    this.observer = null;
    this.timeoutLoading = null;
    this.classes = [];
    this.drawn = [];

    this.createDOM = function() {
        var html = '<div class="loading loading-hidden" id="loading" style="color: ' + this.obj.color + '!important;">';
        html += '	<span class="col-xs-12 text-center container-block loading-content">';
        if (this.obj.position == 'top' && obj.messages.length > 0) {
            html += '			<h4 id="loading-body"></h4>';
        }
        if (this.obj.imageSrc) {
            html += '		<img src="' + this.obj.imageSrc + '">';
        } else {
            html += '		<i id="icon-loading" class="fas fa-solid fa-spinner fa-3x fa-spin"></i>';
        }
        if (this.obj.position == 'bottom' && obj.messages.length > 0) {
            html += '			<h4 id="loading-body"></h4>';
        }
        html += '	</span>';
        html += '</div>';

        if (!document.getElementById('loading')) {
            $('body').append(html);

            this.initObserver();
        }
    }

    this.open = function() {
        $('.loading').removeClass('loading-hidden');
        loading.isHide = false;
    }

    this.close = function() {
        $('.loading').addClass('loading-hidden');
        loading.isHide = true;
    }

    this.toggle = function() {
        $('.loading').toggleClass('loading-hidden');
    }

    this.initObserver = function() {
        var configMutation = {
            'config': {
                childList: true,
                attributes: true,
                subtree: true
            },
            '_id': document.getElementById('loading')
        }

        this.observer = new MutationObserver(this.callbackMutation);
        this.observer.observe(configMutation._id, configMutation.config);
    }

    this.stopObserver = function() {
        this.observer.disconnect();
    }

    this.callbackMutation = function(mutationsList) {
        for (var mutation of mutationsList) {
            if (mutation.type == 'attributes' && mutation.attributeName == 'class') {
                clearTimeout(loading.timeoutLoading);

                loading.classes = [];
                for (var x = 0; x < mutation.target.classList.length; x++) {
                    loading.classes.push(mutation.target.classList[x]);
                }
                loading.isHide = loading.classes.indexOf('hidden') == -1 ? false : true;

                if (loading.obj.messages.length > 0) {
                    loading.sortMessages();
                }
            }
        }
    }

    this.sortMessages = function() {
        var maximunValue = loading.obj.messages.length;
        var suggestion = Math.ceil(Math.random() * maximunValue);

        if (loading.drawn.length == maximunValue) {
            loading.drawn = [];
        }
        while (loading.drawn.indexOf(suggestion) >= 0) {
            suggestion = Math.ceil(Math.random() * maximunValue);
        }
        loading.drawn.push(suggestion);

        if (!loading.isHide) {
            if (!$('#loading-body').text()) {
                setTimeout(function() {
                    $('#loading-body').text(loading.obj.messages[(suggestion - 1)]);
                }, loading.obj.timeout.initMessage);
            } else {
                $('#loading-body').text(loading.obj.messages[(suggestion - 1)]);
            }
            loading.timeoutLoading = window.setTimeout('loading.sortMessages();', loading.obj.timeout.message);
        } else {
            $('#loading-body').text('');
        }
    }

    this.createDOM();
}

let loading = new Loading({
    'color': '#28a745',
    'position': 'bottom',
    'setMessage': 5000,
    'image': true,
    'messages': [
        ' ',
    ]
});