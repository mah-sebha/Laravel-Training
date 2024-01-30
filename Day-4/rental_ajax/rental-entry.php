<script type="text/template" id="rental-entry">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><%= book_title %></h5>
            <h6 class="card-subtitle mb-2 text-muted"><%= book_author %></h6>
            <p class="card-text"><%= rental_date %> | <%= due_date %></p>
        </div>
    </div>
</script>