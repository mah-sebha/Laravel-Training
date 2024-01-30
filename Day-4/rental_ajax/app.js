const apiUrl = 'http://work.test/maharah/mah-sebha/exercise5/public/api';

let api = new Api(apiUrl);
let auth = new Auth(api);

$(document).ready(function() {
    
    $('#loginForm').on('submit', function(e) {
        auth.login('userLoggedIn');
        e.preventDefault();
    });

    $('.section').click(function() {
        let section = $(this).attr('id');
        if (section === 'books-list') {
            getBooksList();
        } else if (section === 'my-rentals') {
            getMyRentals();
        }
    })

    if(auth.authenticate()) {
        api.setApiToken(auth.getToken());
        userLoggedIn();
    }

})

function userLoggedIn() {
    getBooksList()
}

function getBooksList(page = 1) {
    api.get('books?page=' + page).then((response) => {
        if (response.data.length > 0) {
            let entryHtml = $('#book-entry').html();
            let code = '<div class="row">';
            response.data.forEach((book) => {
                let html = '<div class="col-md-4 mt-3">';
                html += entryHtml
                    .replace('<%= id %>', book.id)
                    .replace('<%= title %>', book.title)
                    .replace('<%= description %>', book.description)
                    .replace('<%= author %>', book.author)

                code += html + '</div>';    
            })
            $('#content').html(code)
        }
    })
}

function getMyRentals() {
    api.get('books/rented').then((response) => {
        if (response.data.length > 0) {
            let entryHtml = $('#rental-entry').html();
            let code = '<div class="row">';
            response.data.forEach((rental) => {
                let html = '<div class="col-md-4 mt-3">';
                html += entryHtml
                    .replace('<%= id %>', rental.id)
                    .replace('<%= book_title %>', rental.book.title)
                    .replace('<%= book_author %>', rental.book.author)
                    .replace('<%= rental_date %>', rental.rental_date)
                    .replace('<%= due_date %>', rental.due_date)

                code += html + '</div>';
            })
            $('#content').html(code)
        }
    })
}