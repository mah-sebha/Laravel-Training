class Auth {
    constructor(api) {
        this.api = api;
    }

    login(loggedCallback) {
        let form = $('#loginForm');
        $('#loginBtn').prop('disabled', true);
        this.api.post('get-token', {
            email: form.find('input[name="email"]').val(),
            password: form.find('input[name="password"]').val()
        }).then((response) => {

            if (response.token) {
                localStorage.setItem('rental_app_token', response.token);
                loggedCallback();
            }
        }).catch((error) => {
            
            if (error.responseJSON) {
                alert(error.responseJSON.message);
            }
        }).finally(() => {
            $('#loginBtn').prop('disabled', false);
        })
        
    }

    logout() {
        // TODO: logout
    }

    authenticate() {
        if (!this.isLoggedIn()) {
            const loginModal = new bootstrap.Modal('#loginModal');
            loginModal.show();
            return false;
        } else {
            return true;
        }
    }

    isLoggedIn() {
        let token = localStorage.getItem('rental_app_token');
        if (token) {
            return true;
        } else {
            return false;
        }
    }

    getToken() {
        return localStorage.getItem('rental_app_token');
    }
}