class Api {
    constructor(url) {
        this.url = url;
    }

    setApiToken(token) {
        $.ajaxSetup({
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        });
    }
    
    get(url) {
        return new Promise((resolve, reject) => {
            $.get(`${this.url}/${url}`, function (response) {
                resolve(response);
            }, 'json').fail(function (error) {
                reject(error);
            })
        })
    }

    post(url, data) {
        return new Promise((resolve, reject) => {
            $.post(`${this.url}/${url}`, data, function (response) {
                resolve(response);
            }, 'json').fail(function (error) {
                reject(error);
            })
        })
    }
}